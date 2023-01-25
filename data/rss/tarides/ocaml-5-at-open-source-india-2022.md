---
title: OCaml 5 at Open Source India 2022
description: "Open Source India 2022 With OCaml 5 just around the corner, it's been
  a really exciting year to attend conferences all over the world. Just\u2026"
url: https://tarides.com/blog/2022-11-16-ocaml-5-at-open-source-india-2022
date: 2022-11-16T00:00:00-00:00
preview_image: https://tarides.com/static/6da02c5d6a3fd0a7b0098ae8b3e3c7e0/76288/osi_banner.png
featured:
---

<h1 style="position:relative;"><a href="https://tarides.com/feed.xml#open-source-india-2022" aria-label="open source india 2022 permalink" class="anchor before"><svg aria-hidden="true" focusable="false" height="16" version="1.1" viewbox="0 0 16 16" width="16"><path fill-rule="evenodd" d="M4 9h1v1H4c-1.5 0-3-1.69-3-3.5S2.55 3 4 3h4c1.45 0 3 1.69 3 3.5 0 1.41-.91 2.72-2 3.25V8.59c.58-.45 1-1.27 1-2.09C10 5.22 8.98 4 8 4H4c-.98 0-2 1.22-2 2.5S3 9 4 9zm9-3h-1v1h1c1 0 2 1.22 2 2.5S13.98 12 13 12H9c-.98 0-2-1.22-2-2.5 0-.83.42-1.64 1-2.09V6.25c-1.09.53-2 1.84-2 3.25C6 11.31 7.55 13 9 13h4c1.45 0 3-1.69 3-3.5S14.5 6 13 6z"></path></svg></a>Open Source India 2022</h1>
<p>With OCaml 5 just around the corner, it's been a really exciting year to attend conferences all over the world. Just recently, I presented some highlights of the OCaml 5 update, building on <a href="https://www.youtube.com/watch?v=zJ4G0TKwzVc">KC Sivaramakrishnan's great keynote address</a> at the 19th annual <a href="http://opensourceindia.in">Open Source India 2022</a> conference. Since Tarides was invited to participate, I gave a talk on <em>OCaml 5: Language, Platform, and Ecosystem</em> by starting with OCaml's history and ending with a Multicore OCaml matrix implementation running on 120 cores!</p>
<p>Open Source India was held on the 29-30th September 2022 as a physical event at the NIMHANS Convention Centre, Bengaluru, India. It was organised by the <a href="https://www.opensourceforu.com/">Open Source For You</a> magazine team in India, with the help of community and industry participation. The conference ran along multiple parallel &quot;tracks&quot; - FOSS for Everyone, Developers, CXO Summit, DevOps, AI &amp; ML, Data Management, and IT Infrastructure. My talk was part of the Developers track on the second day.</p>
<h2 style="position:relative;"><a href="https://tarides.com/feed.xml#day-i" aria-label="day i permalink" class="anchor before"><svg aria-hidden="true" focusable="false" height="16" version="1.1" viewbox="0 0 16 16" width="16"><path fill-rule="evenodd" d="M4 9h1v1H4c-1.5 0-3-1.69-3-3.5S2.55 3 4 3h4c1.45 0 3 1.69 3 3.5 0 1.41-.91 2.72-2 3.25V8.59c.58-.45 1-1.27 1-2.09C10 5.22 8.98 4 8 4H4c-.98 0-2 1.22-2 2.5S3 9 4 9zm9-3h-1v1h1c1 0 2 1.22 2 2.5S13.98 12 13 12H9c-.98 0-2-1.22-2-2.5 0-.83.42-1.64 1-2.09V6.25c-1.09.53-2 1.84-2 3.25C6 11.31 7.55 13 9 13h4c1.45 0 3-1.69 3-3.5S14.5 6 13 6z"></path></svg></a>Day I</h2>
<p>The conference had many exhibits, and I interacted with a number of participants at the booths. <a href="https://www.mosip.io/">MOSIP</a> is an open source platform for national foundational identities. Some Governments implement a digital identity system for its citizens, and MOSIP provides a robust, scalable, open source platform for governance. While they currently use <a href="https://github.com/mosip/registration/blob/master/db_scripts/README.md">PostgreSQL</a> as their database backend, it would be useful to re-model their backend to use <a href="https://irmin.io/">Irmin</a> as the data store for security reasons.</p>
<p>Another Business-to-Consumer (B2C), open-source software application was <a href="https://www.chatwoot.com/">Chatwoot</a>, a customer engagement and support platform that also uses PostgreSQL. It would be an interesting data modeling or solution architect project to implement Irmin support for their chat application. The <a href="https://www.umwelten.xyz/dwelling/">Compossible Umwelten</a> company are working on wearable computing using ARM processors, and they were interested in exploring using OCaml, instead of C, for their customer products.</p>
<p>Post-lunch, I attended a talk on <em>Open Source at AWS</em> by Suman Debnath, Principal Developer Advocate, Data Engineering and Analytics at Amazon Web Services. We had the opportunity to discuss the possibility of providing the OCaml Platform and Products available through Amazon directly to end users.</p>
<p>In the afternoon, I took the time to attend the AI &amp; ML track. The <em>Adopting MLSecOps</em> talk was presented by Dibya Prakash, CTO and Principal Consultant at Neural Hub, and he introduced me to MLSecOps and best practices in the industry. This was followed by a talk on <em>Time Series Analysis: Anticipating Future with Darts</em> by Binitha MT and Subhankar Adak from Dell. It was an interesting first day at the conference with useful discussions on technology and real world experiences.</p>
<h2 style="position:relative;"><a href="https://tarides.com/feed.xml#day-ii" aria-label="day ii permalink" class="anchor before"><svg aria-hidden="true" focusable="false" height="16" version="1.1" viewbox="0 0 16 16" width="16"><path fill-rule="evenodd" d="M4 9h1v1H4c-1.5 0-3-1.69-3-3.5S2.55 3 4 3h4c1.45 0 3 1.69 3 3.5 0 1.41-.91 2.72-2 3.25V8.59c.58-.45 1-1.27 1-2.09C10 5.22 8.98 4 8 4H4c-.98 0-2 1.22-2 2.5S3 9 4 9zm9-3h-1v1h1c1 0 2 1.22 2 2.5S13.98 12 13 12H9c-.98 0-2-1.22-2-2.5 0-.83.42-1.64 1-2.09V6.25c-1.09.53-2 1.84-2 3.25C6 11.31 7.55 13 9 13h4c1.45 0 3-1.69 3-3.5S14.5 6 13 6z"></path></svg></a>Day II</h2>
<p>In the morning, I spent some time at the speaker's lounge reviewing the slides for OCaml 5, as well as setting up the demo for the Multicore OCaml code examples. I also had the chance to meet my colleague, Puneeth Chaganti, who works remotely from Bengaluru.</p>
<p><span class="gatsby-resp-image-wrapper" style="position: relative; display: block; margin-left: auto; margin-right: auto; max-width: 680px; ">
      <a href="https://tarides.com/static/b6202cc9d8a0ef2a09c993ece992a258/80e3c/Vf8n4at.jpg" class="gatsby-resp-image-link" style="display: block" target="_blank" rel="noopener">
    <span class="gatsby-resp-image-background-image" style="padding-bottom: 75.29411764705883%; position: relative; bottom: 0; left: 0; background-image: url('data:image/jpeg;base64,/9j/2wBDABALDA4MChAODQ4SERATGCgaGBYWGDEjJR0oOjM9PDkzODdASFxOQERXRTc4UG1RV19iZ2hnPk1xeXBkeFxlZ2P/2wBDARESEhgVGC8aGi9jQjhCY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2NjY2P/wgARCAAPABQDASIAAhEBAxEB/8QAFgABAQEAAAAAAAAAAAAAAAAAAAQG/8QAFQEBAQAAAAAAAAAAAAAAAAAAAAH/2gAMAwEAAhADEAAAAaEksaFmR//EABoQAQEAAgMAAAAAAAAAAAAAAAIBABIEEyH/2gAIAQEAAQUC3uV3rKmvIVOVOE3z/8QAFBEBAAAAAAAAAAAAAAAAAAAAEP/aAAgBAwEBPwE//8QAFBEBAAAAAAAAAAAAAAAAAAAAEP/aAAgBAgEBPwE//8QAGhAAAgIDAAAAAAAAAAAAAAAAAAERIQISMf/aAAgBAQAGPwI2LsSMocI6f//EABsQAAMAAgMAAAAAAAAAAAAAAAABESFRMXGh/9oACAEBAAE/IXtb6MG5vg6kVtEmsjopmQWKNL//2gAMAwEAAgADAAAAEK/P/8QAFREBAQAAAAAAAAAAAAAAAAAAAQD/2gAIAQMBAT8QEm//xAAWEQEBAQAAAAAAAAAAAAAAAAAAEQH/2gAIAQIBAT8Qia//xAAbEAEBAAMBAQEAAAAAAAAAAAABEQAhMUFhgf/aAAgBAQABPxAPNNYgzixDdWekxjNDYW5aIaIe3RcoM+7tKe/uTBRPrn//2Q=='); background-size: cover; display: block;"></span>
  <img src="https://tarides.com/static/b6202cc9d8a0ef2a09c993ece992a258/7bf67/Vf8n4at.jpg" class="gatsby-resp-image-image" alt="Puneeth and Shakthi" title="Puneeth and Shakthi" srcset="/static/b6202cc9d8a0ef2a09c993ece992a258/651be/Vf8n4at.jpg 170w,
/static/b6202cc9d8a0ef2a09c993ece992a258/d30a3/Vf8n4at.jpg 340w,
/static/b6202cc9d8a0ef2a09c993ece992a258/7bf67/Vf8n4at.jpg 680w,
/static/b6202cc9d8a0ef2a09c993ece992a258/80e3c/Vf8n4at.jpg 720w" sizes="(max-width: 680px) 100vw, 680px" style="width:100%;height:100%;margin:0;vertical-align:middle;position:absolute;top:0;left:0;" loading="lazy" decoding="async"/>
  </a>
    </span></p>
<p>That afternoon, I gave my talk on <em>OCaml 5: Language, Platform, and Ecosystem</em>. After reviewing OCaml's history, I discussed the recent <a href="https://github.com/ocaml/ocaml/pull/10831">Multicore OCaml merge</a>, then delved into the syntax of the OCaml 5 language: basic types, operations, control structures, data structures, user types, functions, recursion, and I/O. Following this, I showed examples of <a href="https://github.com/ocaml-multicore/domainslib">domainslib</a> and <a href="https://github.com/ocaml-multicore/eio">Eio</a> before demonstrating the impressive Multicore OCaml matrix implementation running on 120 cores!</p>
<p>Additionally, I presented the various platform tools available in the OCaml community, including the <a href="http://opam.ocaml.org/">OCaml package manager (opam)</a>, the <a href="https://dune.build/">Dune</a> build system, <a href="https://ocaml.github.io/odoc/">odoc</a>, <a href="https://github.com/ocaml/ocaml-lsp">OCaml-LSP</a>, <a href="https://ocaml.github.io/merlin/">Merlin</a>, and <a href="https://github.com/realworldocaml/mdx">MDX</a>. I also introduced the following ecosystem projects:  <a href="https://github.com/ocaml-bench/sandmark">Sandmark</a> benchmarking suite, <a href="https://tezos.com/">Tezos</a> blockchain, <a href="https://irmin.io/">Irmin</a> database, <a href="https://mirageos.org/">MirageOS</a> library operating system, <a href="https://aantron.github.io/dream/">Dream</a> web framework, and <a href="https://ocaml.xyz/">OCaml Scientific Computing</a> project. I finished my talk with some useful references for OCaml. To my delight, the participants were curious to learn more!</p>
<p>The conference gave me a great opportunity to reach out to developers and make them aware of the current state of OCaml. It was good to share the platform and ecosystem projects with them so that they can get started with their contributions. I look forward to participating in more conferences and promoting the use of OCaml!</p>