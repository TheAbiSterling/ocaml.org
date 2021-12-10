<?php
include 'header.php';
?>
     <button class="bg-primary-600  p-3 z-30 rounded-r-xl text-white shadow-md top-2/4 fixed md:hidden"
     :class="sidebar ? 'pl-1 pr-2': ''"
    x-on:click="sidebar = ! sidebar">
    <div x-show="!sidebar">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
        </svg>
    </div>
    <div x-show="sidebar">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
    </div>
</button>
    <div class="lg:py-24 bg-white pt-16" >

        <div class="container-fluid wide">
            <div class="flex">
                <div class="p-10 z-10 w-full bg-white flex-shrink-0 flex-col fixed h-screen overflow-auto md:flex lg:overflow-hidden left-0 top-0 md:relative md:w-60 md:p-0"
                    x-show="sidebar"
                    x-transition:enter="transition duration-200 transform ease-out"
                    x-transition:enter-start="-translate-x-full"
                    x-transition:leave="transition duration-100 transform ease-in"
                    x-transition:leave-end="-translate-x-full">
                    <div class="flex justify-start items-center">
                        <div class="ml-2 font-semibold text-base text-body-600">An introduction to OCaml</div>
                    </div>
                    <div class="space-y-2 flex mt-10 flex-col">
                        <a class="flex text-primary-600 bg-primary-100 py-2 px-3 rounded-md text-sm font-semibold" href="">The core language</a>
                        <a href="" class="font-semibold text-sm text-body-400 hover:bg-gray-100 block py-2 px-3">A First Hour with OCaml</a>
                        <a href="" class="font-semibold text-sm text-body-400 hover:bg-gray-100 block py-2 px-3">OCaml Programming Guidelines</a>
                        <a href="" class="font-semibold text-sm text-body-400 hover:bg-gray-100 block py-2 px-3">Compiling OCaml Projects</a>
                    </div>
                    <div class="space-y-2 flex mt-10 flex-col">
                        <div class="text-sm font-semibold flex px-3 py-2">LANGUAGE FEATURES</div>
                        <a href="" class="font-semibold text-sm text-body-400 hover:bg-gray-100 block py-2 px-3">Data Types and Matching</a>
                        <a href="" class="font-semibold text-sm text-body-400 hover:bg-gray-100 block py-2 px-3">Lists</a>
                        <a href="" class="font-semibold text-sm text-body-400 hover:bg-gray-100 block py-2 px-3">Functional Programming</a>
                        <a href="" class="font-semibold text-sm text-body-400 hover:bg-gray-100 block py-2 px-3">If Statements, Loops and Recursions</a>
                        <a href="" class="font-semibold text-sm text-body-400 hover:bg-gray-100 block py-2 px-3">Modules</a>
                        <a href="" class="font-semibold text-sm text-body-400 hover:bg-gray-100 block py-2 px-3">Labels</a>
                        <a href="" class="font-semibold text-sm text-body-400 hover:bg-gray-100 block py-2 px-3">Pointers</a>
                        <a href="" class="font-semibold text-sm text-body-400 hover:bg-gray-100 block py-2 px-3">Null Pointers, Asserts and Warnings</a>
                        <a href="" class="font-semibold text-sm text-body-400 hover:bg-gray-100 block py-2 px-3">Functors</a>
                        <a href="" class="font-semibold text-sm text-body-400 hover:bg-gray-100 block py-2 px-3">Objects</a>
                        <a href="" class="font-semibold text-sm text-body-400 hover:bg-gray-100 block py-2 px-3">Comparison of Standard Containers</a>
                    </div>
                    <div class="space-y-2 flex mt-10 flex-col">
                        <div class="text-sm font-semibold flex px-3 py-2">Error and debugging</div>
                        <a href="" class="font-semibold text-sm text-body-400 hover:bg-gray-100 block py-2 px-3">Error Handling</a>
                        <a href="" class="font-semibold text-sm text-body-400 hover:bg-gray-100 block py-2 px-3">Common Error Messages</a>
                    </div>


                </div>
                <div class="flex-1 flex overflow-hidden">
                    <div class="prose prose-orange overflow-hidden z-0 z- lg:max-w-4xl mx-auto relative py-8 px-6 lg:pt-0">
                                <h2 class="font-bold text-body-600">The core language</h2>
                                <p>This part of the manual is a tutorial introduction to the OCaml language. A good familiarity with programming in a conventional languages (say, C or Java) is assumed, but no prior exposure to functional languages is required. The present chapter introduces the core language. Chapter ‍2 deals with the module system, chapter ‍3 with the object-oriented features, chapter ‍4 with labeled arguments, chapter ‍5 with polymorphic variants, chapter ‍6 with the limitations of polymorphism, and chapter ‍8 gives some advanced examples.
                        </p>
                        <h4 class="font-bold">1. Basics</h4>
                                <p>For this overview of OCaml, we use the interactive system, which is started by running ocaml from the Unix shell or Windows command prompt. This tutorial is presented as the transcript of a session with the interactive system: lines starting with # represent user input; the system responses are printed below, without a leading #.</p>
                                <p>Under the interactive system, the user types OCaml phrases terminated by ;; in response to the # prompt, and the system compiles them on the fly, executes them, and prints the outcome of evaluation. Phrases are either simple expressions, or let definitions of identifiers (either values or functions).</p>
                        <pre class="overflow-auto w-full"><code># 1 + 2 * 3;;
- : int = 7</code></pre>
<pre><code># let pi = 4.0 *. atan 1.0;;
val pi : float = 3.14159265358979312</code></pre>
<div class="border-t border-gray-200 mt-16 pt-10 flex justify-between flex-col lg:flex-row items-center">
                <a href="" class="text-body-400"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 -mt-1 inline-block mr-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
</svg>Previous tutorial</a>
                <a href="" class="text-body-400 ">A First Hour with OCaml <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 -mt-1 ml-4 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
</svg></a>
            </div>
                    </div>
                
                </div>
                
                <div class=" hidden lg:flex">
                    <div class="flex-col w-60">
                        <div class="h-auto border border-gray-200 rounded-xl p-6 right-sidebar">
                            <div class="font-semibold text-black text-sm mb-4">ON THIS PAGE</div>
                            <a href="" class="font-semibold text-body-600 text-sm mb-4 flex align-top">1. <span class="ml-3">Basics</span></a>
                            <a href="" class="font-semibold text-body-400 text-sm mb-4 flex align-top">2. <span class="ml-3">Functions as values</span></a>
                            <a href="" class="font-semibold text-body-400 text-sm mb-4 flex align-top">3. <span class="ml-3">Records and variants</span></a>
                            <a href="" class="font-semibold text-body-400 text-sm mb-4 flex align-top">4. <span class="ml-3">Data types</span></a>
                            <a href="" class="font-semibold text-body-400 text-sm mb-4 flex ml-4 align-top">4.4 <div class="ml-3">Record and variant disambiguation</div></a>
                            <a href="" class="font-semibold text-body-400 text-sm mb-4 flex align-top">5. <span class="ml-3">DImperative features</span></a>
                            <a href="" class="font-semibold text-body-400 text-sm mb-4 flex align-top">6. <span class="ml-3">Exceptions</span></a>
                            <a href="" class="font-semibold text-body-400 text-sm mb-4 flex align-top">7. <span class="ml-3">DLazy Expressions</span></a>
                            <a href="" class="font-semibold text-body-400 text-sm mb-4 flex align-top">8. <span class="ml-3">Symbolic processing of expressions</span></a>
                            <a href="" class="font-semibold text-body-400 text-sm mb-4 flex align-top">9. <span class="ml-3">Pretty-printing</span></a>
                            <a href="" class="font-semibold text-body-400 text-sm mb-4 flex align-top">10. <span class="ml-3">Printf formats</span></a>
                            <a href="" class="font-semibold text-body-400 text-sm mb-4 flex align-top">11. <span class="ml-3">Standalone OCaml programs</span></a>
                        </div>
                    </div>

                </div>
                
            </div>
        </div>
    </div>
    <?php
    include 'footer.php';
    ?>