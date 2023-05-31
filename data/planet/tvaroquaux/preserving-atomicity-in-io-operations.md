---
title: Preserving atomicity in IO operations
description: '[Updated 26/07/07: unwind_protect  now captures less variables.]      There
  are a bunch of operation that must be executed in pairs, for ins...'
url: https://till-varoquaux.blogspot.com/2007/06/preserving-atomicity-in-io-operations.html
date: 2007-06-24T14:34:00-00:00
preview_image:
featured:
authors:
- Till
---

<p>[Updated 26/07/07: <span style="background:#e6e6e6;border:1px solid #a0a0a0;"><tt>unwind_protect</tt></span> now captures less variables.]</p>
    <p>There are a bunch of operation that must be executed in pairs, for instance openned channel SHOULD be closed. That is: every call to an <span style="background:#e6e6e6;border:1px solid #a0a0a0;"><tt>open_in</tt></span> on a file should be followed by a subsequent <span style="background:#e6e6e6;border:1px solid #a0a0a0;"><tt>close_in</tt></span> on the openned channel.</p>
    <h2>Edging towards a solution:</h2>
    <p>Lispers actually have a neat way atomicity of file descriptor operations. <a href="http://www.cs.queensu.ca/software_docs/gnudev/gcl-ansi/gcl_1192.html" class="externalLink">with-open-file</a></p>
    <p><span style="background:#e6e6e6;border:1px solid #a0a0a0;"><tt>with_open_file</tt></span> takes the name of the file to and a function working on the file handle, this function should not close the file handle. A first shot would look like:</p>
    <div style="background:#e6e6e6;border:1px solid #a0a0a0;">
      <tt><span style="font-weight: bold"><span style="color: #0000FF">let</span></span>&nbsp;with_open_in&nbsp;file&nbsp;f<span style="color: #990000">=</span><br/>&nbsp;<span style="font-weight: bold"><span style="color: #0000FF">let</span></span>&nbsp;ic<span style="color: #990000">=</span>open_in&nbsp;file&nbsp;<span style="font-weight: bold"><span style="color: #0000FF">in</span></span><br/>&nbsp;<span style="font-weight: bold"><span style="color: #0000FF">let</span></span>&nbsp;res<span style="color: #990000">=</span>f&nbsp;ic&nbsp;<span style="font-weight: bold"><span style="color: #0000FF">in</span></span><br/>&nbsp;close_in&nbsp;ic<span style="color: #990000">;</span><br/>&nbsp;res</tt>
    </div>
    <p>Although at a first glance this looks ok it will break down if an exception is raised in <span style="background:#e6e6e6;border:1px solid #a0a0a0;"><tt>f</tt></span>. We will now introduce a new function from the lisp world. <a href="http://www.cs.queensu.ca/software_docs/gnudev/gcl-ansi/gcl_385.html" class="externalLink">unwind-protect</a></p>
    <h2>Unwind-protect:</h2>
    <p><span style="background:#e6e6e6;border:1px solid #a0a0a0;"><tt>unwind_protect</tt></span> takes two functions, the second one being a cleanup function. <span style="background:#e6e6e6;border:1px solid #a0a0a0;"><tt>unwind_protect&nbsp;f&nbsp;cleanup</tt></span> returns the result of running <span style="background:#e6e6e6;border:1px solid #a0a0a0;"><tt>f&nbsp;<span style="color: #990000">()</span></tt></span>. Whatever happens in <span style="background:#e6e6e6;border:1px solid #a0a0a0;"><tt>f&nbsp;<span style="color: #990000">()</span></tt></span>, <span style="background:#e6e6e6;border:1px solid #a0a0a0;"><tt>cleanup&nbsp;<span style="color: #990000">()</span></tt></span> will be called.</p>
    <div style="background:#e6e6e6;border:1px solid #a0a0a0;">
      <tt><span style="font-weight: bold"><span style="color: #0000FF">let</span></span>&nbsp;unwind_protect&nbsp;f&nbsp;g<span style="color: #990000">=</span><br/>&nbsp;<span style="font-weight: bold"><span style="color: #0000FF">let</span></span>&nbsp;run&nbsp;f&nbsp;<span style="color: #990000">()=</span><br/>&nbsp;&nbsp;<span style="font-weight: bold"><span style="color: #0000FF">match</span></span>&nbsp;<span style="color: #990000">!</span>f&nbsp;<span style="font-weight: bold"><span style="color: #0000FF">with</span></span><br/>&nbsp;&nbsp;&nbsp;<span style="color: #990000">|</span>&nbsp;<span style="color: #009900">Some</span>&nbsp;f&nbsp;<span style="color: #990000">-&gt;</span>&nbsp;f&nbsp;<span style="color: #990000">()</span><br/>&nbsp;&nbsp;&nbsp;<span style="color: #990000">|</span>&nbsp;<span style="color: #009900">None</span>&nbsp;<span style="color: #990000">-&gt;</span>&nbsp;<span style="color: #990000">()</span><br/>&nbsp;<span style="font-weight: bold"><span style="color: #0000FF">in</span></span><br/>&nbsp;<span style="font-weight: bold"><span style="color: #0000FF">let</span></span>&nbsp;closeFun<span style="color: #990000">=</span><span style="color: #009900">ref</span>&nbsp;<span style="color: #990000">(</span><span style="color: #009900">Some</span>&nbsp;g<span style="color: #990000">)</span>&nbsp;<span style="font-weight: bold"><span style="color: #0000FF">in</span></span><br/>&nbsp;at_exit&nbsp;<span style="color: #990000">(</span>run&nbsp;closeFun<span style="color: #990000">);</span><br/>&nbsp;<span style="font-weight: bold"><span style="color: #0000FF">let</span></span>&nbsp;res<span style="color: #990000">=</span><br/>&nbsp;&nbsp;<span style="font-weight: bold"><span style="color: #0000FF">try</span></span><br/>&nbsp;&nbsp;&nbsp;f&nbsp;<span style="color: #990000">()</span><br/>&nbsp;&nbsp;<span style="font-weight: bold"><span style="color: #0000FF">with</span></span>&nbsp;e&nbsp;<span style="color: #990000">-&gt;</span><br/>&nbsp;&nbsp;&nbsp;g&nbsp;<span style="color: #990000">();</span><br/>&nbsp;&nbsp;&nbsp;raise&nbsp;e<br/>&nbsp;<span style="font-weight: bold"><span style="color: #0000FF">in</span></span><br/>&nbsp;closeFun&nbsp;<span style="color: #990000">:=</span>&nbsp;<span style="color: #009900">None</span><span style="color: #990000">;</span><br/>&nbsp;g&nbsp;<span style="color: #990000">();</span><br/>&nbsp;res</tt>
    </div>
    <p><span style="background:#e6e6e6;border:1px solid #a0a0a0;"><tt>with_open_file</tt></span> can now be coded as:</p>
    <div style="background:#e6e6e6;border:1px solid #a0a0a0;">
      <tt><span style="font-weight: bold"><span style="color: #0000FF">let</span></span>&nbsp;with_open_in&nbsp;filename&nbsp;f<span style="color: #990000">=</span><br/>&nbsp;<span style="font-weight: bold"><span style="color: #0000FF">let</span></span>&nbsp;ch<span style="color: #990000">=</span>open_in&nbsp;filename&nbsp;<span style="font-weight: bold"><span style="color: #0000FF">in</span></span><br/>&nbsp;unwind_protect&nbsp;<span style="color: #990000">(</span><span style="font-weight: bold"><span style="color: #0000FF">fun</span></span>&nbsp;<span style="color: #990000">()</span>&nbsp;<span style="color: #990000">-&gt;</span>&nbsp;f&nbsp;ch<span style="color: #990000">)</span>&nbsp;<span style="color: #990000">(</span><span style="font-weight: bold"><span style="color: #0000FF">fun</span></span>&nbsp;<span style="color: #990000">()</span>&nbsp;<span style="color: #990000">-&gt;</span>&nbsp;close_in&nbsp;ch<span style="color: #990000">)</span></tt>
    </div>
    <h2>Wrapping it up:</h2>
    <p>We now would like to force the usage of our new functions instead of the old ones. We do not want to define a new type of channel and there is no way to 'hide' them from <span style="background:#e6e6e6;border:1px solid #a0a0a0;"><tt><span style="color: #009900">Pervasives</span></tt></span>, we can however override the functions we don't want to allow with an abstract type:</p>
    <div style="background:#e6e6e6;border:1px solid #a0a0a0;">
      <tt><span style="font-weight: bold"><span style="color: #0000FF">module</span></span>&nbsp;<span style="color: #009900">Abstract</span><span style="color: #990000">:</span><span style="font-weight: bold"><span style="color: #0000FF">sig</span></span><br/>&nbsp;<span style="font-weight: bold"><span style="color: #0000FF">type</span></span>&nbsp;t<br/>&nbsp;<span style="font-weight: bold"><span style="color: #0000FF">val</span></span>&nbsp;v<span style="color: #990000">:</span>t<br/><span style="font-weight: bold"><span style="color: #0000FF">end</span></span><br/><span style="color: #990000">=</span><br/><span style="font-weight: bold"><span style="color: #0000FF">struct</span></span><br/>&nbsp;<span style="font-weight: bold"><span style="color: #0000FF">type</span></span>&nbsp;t<span style="color: #990000">=</span><span style="color: #009900">unit</span><br/>&nbsp;<span style="font-weight: bold"><span style="color: #0000FF">let</span></span>&nbsp;v<span style="color: #990000">=()</span><br/><span style="font-weight: bold"><span style="color: #0000FF">end</span></span><br/><span style="font-weight: bold"><span style="color: #0000FF">let</span></span>&nbsp;open_out<span style="color: #990000">=</span><span style="font-weight: bold"><span style="color: #000080">Abstract</span></span><span style="color: #990000">.</span>v<br/><span style="font-weight: bold"><span style="color: #0000FF">let</span></span>&nbsp;open_in<span style="color: #990000">=</span><span style="font-weight: bold"><span style="color: #000080">Abstract</span></span><span style="color: #990000">.</span>v<br/><span style="font-weight: bold"><span style="color: #0000FF">let</span></span>&nbsp;close_out<span style="color: #990000">=</span><span style="font-weight: bold"><span style="color: #000080">Abstract</span></span><span style="color: #990000">.</span>v<br/><span style="font-weight: bold"><span style="color: #0000FF">let</span></span>&nbsp;close_in<span style="color: #990000">=</span><span style="font-weight: bold"><span style="color: #000080">Abstract</span></span><span style="color: #990000">.</span>v</tt>
    </div>
    <h2>Conclusion:</h2>
    <p>This looks like yet another modification one could wish for in OCaml standard library. </p>