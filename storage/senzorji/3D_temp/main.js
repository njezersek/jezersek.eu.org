


<!DOCTYPE html>
<html>
  <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# githubog: http://ogp.me/ns/fb/githubog#">
    <meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>webgl-textures-particles/final-result/main.js at master · tutsplus/webgl-textures-particles · GitHub</title>
    <link rel="search" type="application/opensearchdescription+xml" href="/opensearch.xml" title="GitHub" />
    <link rel="fluid-icon" href="https://github.com/fluidicon.png" title="GitHub" />
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-114.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-144.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144.png" />
    <link rel="logo" type="image/svg" href="https://github-media-downloads.s3.amazonaws.com/github-logo.svg" />
    <meta property="og:image" content="https://github.global.ssl.fastly.net/images/modules/logos_page/Octocat.png">
    <meta name="hostname" content="github-fe119-cp1-prd.iad.github.net">
    <meta name="ruby" content="ruby 1.9.3p194-tcs-github-tcmalloc (e1c0c3f392) [x86_64-linux]">
    <link rel="assets" href="https://github.global.ssl.fastly.net/">
    <link rel="conduit-xhr" href="https://ghconduit.com:25035/">
    <link rel="xhr-socket" href="/_sockets" />
    


    <meta name="msapplication-TileImage" content="/windows-tile.png" />
    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta name="selected-link" value="repo_source" data-pjax-transient />
    <meta content="collector.githubapp.com" name="octolytics-host" /><meta content="collector-cdn.github.com" name="octolytics-script-host" /><meta content="github" name="octolytics-app-id" /><meta content="1F0FB898:4E6A:6AAE88:52B4D243" name="octolytics-dimension-request_id" />
    

    
    
    <link rel="icon" type="image/x-icon" href="/favicon.ico" />

    <meta content="authenticity_token" name="csrf-param" />
<meta content="8l/8AjNW68m5HjhJbiJPitCZklmdmuO60kKYXDb9yzs=" name="csrf-token" />

    <link href="https://github.global.ssl.fastly.net/assets/github-8f6ca9b17ae3eba1e30276eef0a16282cb651c78.css" media="all" rel="stylesheet" type="text/css" />
    <link href="https://github.global.ssl.fastly.net/assets/github2-efb30206b3c48724763c8fce889ca6dab1b487db.css" media="all" rel="stylesheet" type="text/css" />
    

    

      <script src="https://github.global.ssl.fastly.net/assets/frameworks-29a3fb0547e33bd8d4530bbad9bae3ef00d83293.js" type="text/javascript"></script>
      <script src="https://github.global.ssl.fastly.net/assets/github-0b6bf4a8bb8bc8246eb6d07db6a63cde130f5001.js" type="text/javascript"></script>
      
      <meta http-equiv="x-pjax-version" content="25e9435426189c5ffea9ed5e7a16f621">

        <link data-pjax-transient rel='permalink' href='/tutsplus/webgl-textures-particles/blob/021267797cf2647b651a4875c4469778e6b4a756/final-result/main.js'>
  <meta property="og:title" content="webgl-textures-particles"/>
  <meta property="og:type" content="githubog:gitrepository"/>
  <meta property="og:url" content="https://github.com/tutsplus/webgl-textures-particles"/>
  <meta property="og:image" content="https://github.global.ssl.fastly.net/images/gravatars/gravatar-user-420.png"/>
  <meta property="og:site_name" content="GitHub"/>
  <meta property="og:description" content="Contribute to webgl-textures-particles development by creating an account on GitHub."/>

  <meta name="description" content="Contribute to webgl-textures-particles development by creating an account on GitHub." />

  <meta content="3423892" name="octolytics-dimension-user_id" /><meta content="tutsplus" name="octolytics-dimension-user_login" /><meta content="14783115" name="octolytics-dimension-repository_id" /><meta content="tutsplus/webgl-textures-particles" name="octolytics-dimension-repository_nwo" /><meta content="true" name="octolytics-dimension-repository_public" /><meta content="false" name="octolytics-dimension-repository_is_fork" /><meta content="14783115" name="octolytics-dimension-repository_network_root_id" /><meta content="tutsplus/webgl-textures-particles" name="octolytics-dimension-repository_network_root_nwo" />
  <link href="https://github.com/tutsplus/webgl-textures-particles/commits/master.atom" rel="alternate" title="Recent Commits to webgl-textures-particles:master" type="application/atom+xml" />

  </head>


  <body class="logged_out  env-production windows vis-public page-blob">
    <div class="wrapper">
      
      
      
      


      
      <div class="header header-logged-out">
  <div class="container clearfix">

    <a class="header-logo-wordmark" href="https://github.com/">
      <span class="mega-octicon octicon-logo-github"></span>
    </a>

    <div class="header-actions">
        <a class="button primary" href="/join">Sign up</a>
      <a class="button signin" href="/login?return_to=%2Ftutsplus%2Fwebgl-textures-particles%2Fblob%2Fmaster%2Ffinal-result%2Fmain.js">Sign in</a>
    </div>

    <div class="command-bar js-command-bar  in-repository">

      <ul class="top-nav">
          <li class="explore"><a href="/explore">Explore</a></li>
        <li class="features"><a href="/features">Features</a></li>
          <li class="enterprise"><a href="https://enterprise.github.com/">Enterprise</a></li>
          <li class="blog"><a href="/blog">Blog</a></li>
      </ul>
        <form accept-charset="UTF-8" action="/search" class="command-bar-form" id="top_search_form" method="get">

<input type="text" data-hotkey="/ s" name="q" id="js-command-bar-field" placeholder="Search or type a command" tabindex="1" autocapitalize="off"
    
    
      data-repo="tutsplus/webgl-textures-particles"
      data-branch="master"
      data-sha="5e241aa7bbed3ed2c3bb76da8d3d8ff888390644"
  >

    <input type="hidden" name="nwo" value="tutsplus/webgl-textures-particles" />

    <div class="select-menu js-menu-container js-select-menu search-context-select-menu">
      <span class="minibutton select-menu-button js-menu-target">
        <span class="js-select-button">This repository</span>
      </span>

      <div class="select-menu-modal-holder js-menu-content js-navigation-container">
        <div class="select-menu-modal">

          <div class="select-menu-item js-navigation-item js-this-repository-navigation-item selected">
            <span class="select-menu-item-icon octicon octicon-check"></span>
            <input type="radio" class="js-search-this-repository" name="search_target" value="repository" checked="checked" />
            <div class="select-menu-item-text js-select-button-text">This repository</div>
          </div> <!-- /.select-menu-item -->

          <div class="select-menu-item js-navigation-item js-all-repositories-navigation-item">
            <span class="select-menu-item-icon octicon octicon-check"></span>
            <input type="radio" name="search_target" value="global" />
            <div class="select-menu-item-text js-select-button-text">All repositories</div>
          </div> <!-- /.select-menu-item -->

        </div>
      </div>
    </div>

  <span class="octicon help tooltipped downwards" title="Show command bar help">
    <span class="octicon octicon-question"></span>
  </span>


  <input type="hidden" name="ref" value="cmdform">

</form>
    </div>

  </div>
</div>


      


          <div class="site" itemscope itemtype="http://schema.org/WebPage">
    
    <div class="pagehead repohead instapaper_ignore readability-menu">
      <div class="container">
        

<ul class="pagehead-actions">


  <li>
    <a href="/login?return_to=%2Ftutsplus%2Fwebgl-textures-particles"
    class="minibutton with-count js-toggler-target star-button tooltipped upwards"
    title="You must be signed in to use this feature" rel="nofollow">
    <span class="octicon octicon-star"></span>Star
  </a>

    <a class="social-count js-social-count" href="/tutsplus/webgl-textures-particles/stargazers">
      3
    </a>

  </li>

    <li>
      <a href="/login?return_to=%2Ftutsplus%2Fwebgl-textures-particles"
        class="minibutton with-count js-toggler-target fork-button tooltipped upwards"
        title="You must be signed in to fork a repository" rel="nofollow">
        <span class="octicon octicon-git-branch"></span>Fork
      </a>
      <a href="/tutsplus/webgl-textures-particles/network" class="social-count">
        1
      </a>
    </li>
</ul>

        <h1 itemscope itemtype="http://data-vocabulary.org/Breadcrumb" class="entry-title public">
          <span class="repo-label"><span>public</span></span>
          <span class="mega-octicon octicon-repo"></span>
          <span class="author">
            <a href="/tutsplus" class="url fn" itemprop="url" rel="author"><span itemprop="title">tutsplus</span></a>
          </span>
          <span class="repohead-name-divider">/</span>
          <strong><a href="/tutsplus/webgl-textures-particles" class="js-current-repository js-repo-home-link">webgl-textures-particles</a></strong>

          <span class="page-context-loader">
            <img alt="Octocat-spinner-32" height="16" src="https://github.global.ssl.fastly.net/images/spinners/octocat-spinner-32.gif" width="16" />
          </span>

        </h1>
      </div><!-- /.container -->
    </div><!-- /.repohead -->

    <div class="container">
      

      <div class="repository-with-sidebar repo-container  ">

        <div class="repository-sidebar">
            

<div class="sunken-menu vertical-right repo-nav js-repo-nav js-repository-container-pjax js-octicon-loaders">
  <div class="sunken-menu-contents">
    <ul class="sunken-menu-group">
      <li class="tooltipped leftwards" title="Code">
        <a href="/tutsplus/webgl-textures-particles" aria-label="Code" class="selected js-selected-navigation-item sunken-menu-item" data-gotokey="c" data-pjax="true" data-selected-links="repo_source repo_downloads repo_commits repo_tags repo_branches /tutsplus/webgl-textures-particles">
          <span class="octicon octicon-code"></span> <span class="full-word">Code</span>
          <img alt="Octocat-spinner-32" class="mini-loader" height="16" src="https://github.global.ssl.fastly.net/images/spinners/octocat-spinner-32.gif" width="16" />
</a>      </li>

        <li class="tooltipped leftwards" title="Issues">
          <a href="/tutsplus/webgl-textures-particles/issues" aria-label="Issues" class="js-selected-navigation-item sunken-menu-item js-disable-pjax" data-gotokey="i" data-selected-links="repo_issues /tutsplus/webgl-textures-particles/issues">
            <span class="octicon octicon-issue-opened"></span> <span class="full-word">Issues</span>
            <span class='counter'>0</span>
            <img alt="Octocat-spinner-32" class="mini-loader" height="16" src="https://github.global.ssl.fastly.net/images/spinners/octocat-spinner-32.gif" width="16" />
</a>        </li>

      <li class="tooltipped leftwards" title="Pull Requests">
        <a href="/tutsplus/webgl-textures-particles/pulls" aria-label="Pull Requests" class="js-selected-navigation-item sunken-menu-item js-disable-pjax" data-gotokey="p" data-selected-links="repo_pulls /tutsplus/webgl-textures-particles/pulls">
            <span class="octicon octicon-git-pull-request"></span> <span class="full-word">Pull Requests</span>
            <span class='counter'>0</span>
            <img alt="Octocat-spinner-32" class="mini-loader" height="16" src="https://github.global.ssl.fastly.net/images/spinners/octocat-spinner-32.gif" width="16" />
</a>      </li>


    </ul>
    <div class="sunken-menu-separator"></div>
    <ul class="sunken-menu-group">

      <li class="tooltipped leftwards" title="Pulse">
        <a href="/tutsplus/webgl-textures-particles/pulse" aria-label="Pulse" class="js-selected-navigation-item sunken-menu-item" data-pjax="true" data-selected-links="pulse /tutsplus/webgl-textures-particles/pulse">
          <span class="octicon octicon-pulse"></span> <span class="full-word">Pulse</span>
          <img alt="Octocat-spinner-32" class="mini-loader" height="16" src="https://github.global.ssl.fastly.net/images/spinners/octocat-spinner-32.gif" width="16" />
</a>      </li>

      <li class="tooltipped leftwards" title="Graphs">
        <a href="/tutsplus/webgl-textures-particles/graphs" aria-label="Graphs" class="js-selected-navigation-item sunken-menu-item" data-pjax="true" data-selected-links="repo_graphs repo_contributors /tutsplus/webgl-textures-particles/graphs">
          <span class="octicon octicon-graph"></span> <span class="full-word">Graphs</span>
          <img alt="Octocat-spinner-32" class="mini-loader" height="16" src="https://github.global.ssl.fastly.net/images/spinners/octocat-spinner-32.gif" width="16" />
</a>      </li>

      <li class="tooltipped leftwards" title="Network">
        <a href="/tutsplus/webgl-textures-particles/network" aria-label="Network" class="js-selected-navigation-item sunken-menu-item js-disable-pjax" data-selected-links="repo_network /tutsplus/webgl-textures-particles/network">
          <span class="octicon octicon-git-branch"></span> <span class="full-word">Network</span>
          <img alt="Octocat-spinner-32" class="mini-loader" height="16" src="https://github.global.ssl.fastly.net/images/spinners/octocat-spinner-32.gif" width="16" />
</a>      </li>
    </ul>


  </div>
</div>

            <div class="only-with-full-nav">
              

  

<div class="clone-url open"
  data-protocol-type="http"
  data-url="/users/set_protocol?protocol_selector=http&amp;protocol_type=clone">
  <h3><strong>HTTPS</strong> clone URL</h3>
  <div class="clone-url-box">
    <input type="text" class="clone js-url-field"
           value="https://github.com/tutsplus/webgl-textures-particles.git" readonly="readonly">

    <span class="js-zeroclipboard url-box-clippy minibutton zeroclipboard-button" data-clipboard-text="https://github.com/tutsplus/webgl-textures-particles.git" data-copied-hint="copied!" title="copy to clipboard"><span class="octicon octicon-clippy"></span></span>
  </div>
</div>

  

<div class="clone-url "
  data-protocol-type="subversion"
  data-url="/users/set_protocol?protocol_selector=subversion&amp;protocol_type=clone">
  <h3><strong>Subversion</strong> checkout URL</h3>
  <div class="clone-url-box">
    <input type="text" class="clone js-url-field"
           value="https://github.com/tutsplus/webgl-textures-particles" readonly="readonly">

    <span class="js-zeroclipboard url-box-clippy minibutton zeroclipboard-button" data-clipboard-text="https://github.com/tutsplus/webgl-textures-particles" data-copied-hint="copied!" title="copy to clipboard"><span class="octicon octicon-clippy"></span></span>
  </div>
</div>


<p class="clone-options">You can clone with
      <a href="#" class="js-clone-selector" data-protocol="http">HTTPS</a>,
      or <a href="#" class="js-clone-selector" data-protocol="subversion">Subversion</a>.
  <span class="octicon help tooltipped upwards" title="Get help on which URL is right for you.">
    <a href="https://help.github.com/articles/which-remote-url-should-i-use">
    <span class="octicon octicon-question"></span>
    </a>
  </span>
</p>


  <a href="http://windows.github.com" class="minibutton sidebar-button">
    <span class="octicon octicon-device-desktop"></span>
    Clone in Desktop
  </a>

              <a href="/tutsplus/webgl-textures-particles/archive/master.zip"
                 class="minibutton sidebar-button"
                 title="Download this repository as a zip file"
                 rel="nofollow">
                <span class="octicon octicon-cloud-download"></span>
                Download ZIP
              </a>
            </div>
        </div><!-- /.repository-sidebar -->

        <div id="js-repo-pjax-container" class="repository-content context-loader-container" data-pjax-container>
          


<!-- blob contrib key: blob_contributors:v21:05da3f936ad34621d73176ad6e56d33a -->

<p title="This is a placeholder element" class="js-history-link-replace hidden"></p>

<a href="/tutsplus/webgl-textures-particles/find/master" data-pjax data-hotkey="t" class="js-show-file-finder" style="display:none">Show File Finder</a>

<div class="file-navigation">
  

<div class="select-menu js-menu-container js-select-menu" >
  <span class="minibutton select-menu-button js-menu-target" data-hotkey="w"
    data-master-branch="master"
    data-ref="master"
    role="button" aria-label="Switch branches or tags" tabindex="0">
    <span class="octicon octicon-git-branch"></span>
    <i>branch:</i>
    <span class="js-select-button">master</span>
  </span>

  <div class="select-menu-modal-holder js-menu-content js-navigation-container" data-pjax>

    <div class="select-menu-modal">
      <div class="select-menu-header">
        <span class="select-menu-title">Switch branches/tags</span>
        <span class="octicon octicon-remove-close js-menu-close"></span>
      </div> <!-- /.select-menu-header -->

      <div class="select-menu-filters">
        <div class="select-menu-text-filter">
          <input type="text" aria-label="Filter branches/tags" id="context-commitish-filter-field" class="js-filterable-field js-navigation-enable" placeholder="Filter branches/tags">
        </div>
        <div class="select-menu-tabs">
          <ul>
            <li class="select-menu-tab">
              <a href="#" data-tab-filter="branches" class="js-select-menu-tab">Branches</a>
            </li>
            <li class="select-menu-tab">
              <a href="#" data-tab-filter="tags" class="js-select-menu-tab">Tags</a>
            </li>
          </ul>
        </div><!-- /.select-menu-tabs -->
      </div><!-- /.select-menu-filters -->

      <div class="select-menu-list select-menu-tab-bucket js-select-menu-tab-bucket" data-tab-filter="branches">

        <div data-filterable-for="context-commitish-filter-field" data-filterable-type="substring">


            <div class="select-menu-item js-navigation-item selected">
              <span class="select-menu-item-icon octicon octicon-check"></span>
              <a href="/tutsplus/webgl-textures-particles/blob/master/final-result/main.js"
                 data-name="master"
                 data-skip-pjax="true"
                 rel="nofollow"
                 class="js-navigation-open select-menu-item-text js-select-button-text css-truncate-target"
                 title="master">master</a>
            </div> <!-- /.select-menu-item -->
        </div>

          <div class="select-menu-no-results">Nothing to show</div>
      </div> <!-- /.select-menu-list -->

      <div class="select-menu-list select-menu-tab-bucket js-select-menu-tab-bucket" data-tab-filter="tags">
        <div data-filterable-for="context-commitish-filter-field" data-filterable-type="substring">


        </div>

        <div class="select-menu-no-results">Nothing to show</div>
      </div> <!-- /.select-menu-list -->

    </div> <!-- /.select-menu-modal -->
  </div> <!-- /.select-menu-modal-holder -->
</div> <!-- /.select-menu -->

  <div class="breadcrumb">
    <span class='repo-root js-repo-root'><span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="/tutsplus/webgl-textures-particles" data-branch="master" data-direction="back" data-pjax="true" itemscope="url"><span itemprop="title">webgl-textures-particles</span></a></span></span><span class="separator"> / </span><span itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="/tutsplus/webgl-textures-particles/tree/master/final-result" data-branch="master" data-direction="back" data-pjax="true" itemscope="url"><span itemprop="title">final-result</span></a></span><span class="separator"> / </span><strong class="final-path">main.js</strong> <span class="js-zeroclipboard minibutton zeroclipboard-button" data-clipboard-text="final-result/main.js" data-copied-hint="copied!" title="copy to clipboard"><span class="octicon octicon-clippy"></span></span>
  </div>
</div>



  <div class="commit file-history-tease">
    <img class="main-avatar" height="24" src="https://0.gravatar.com/avatar/e82dc0619b0c1a4c8361d3a06f6456a2?d=https%3A%2F%2Fidenticons.github.com%2F3471c419570f4043848ca18b0972aca3.png&amp;r=x&amp;s=140" width="24" />
    <span class="author"><a href="/andrewperk" rel="author">andrewperk</a></span>
    <time class="js-relative-date" datetime="2013-11-28T09:38:53-08:00" title="2013-11-28 09:38:53">November 28, 2013</time>
    <div class="commit-title">
        <a href="/tutsplus/webgl-textures-particles/commit/021267797cf2647b651a4875c4469778e6b4a756" class="message" data-pjax="true" title="Source added">Source added</a>
    </div>

    <div class="participation">
      <p class="quickstat"><a href="#blob_contributors_box" rel="facebox"><strong>1</strong> contributor</a></p>
      
    </div>
    <div id="blob_contributors_box" style="display:none">
      <h2 class="facebox-header">Users who have contributed to this file</h2>
      <ul class="facebox-user-list">
          <li class="facebox-user-list-item">
            <img height="24" src="https://0.gravatar.com/avatar/e82dc0619b0c1a4c8361d3a06f6456a2?d=https%3A%2F%2Fidenticons.github.com%2F3471c419570f4043848ca18b0972aca3.png&amp;r=x&amp;s=140" width="24" />
            <a href="/andrewperk">andrewperk</a>
          </li>
      </ul>
    </div>
  </div>

<div id="files" class="bubble">
  <div class="file">
    <div class="meta">
      <div class="info">
        <span class="icon"><b class="octicon octicon-file-text"></b></span>
        <span class="mode" title="File Mode">executable file</span>
          <span>90 lines (71 sloc)</span>
        <span>3.404 kb</span>
      </div>
      <div class="actions">
        <div class="button-group">
            <a class="minibutton tooltipped leftwards"
               href="http://windows.github.com" title="Open this file in GitHub for Windows">
                <span class="octicon octicon-device-desktop"></span> Open
            </a>
              <a class="minibutton disabled tooltipped leftwards" href="#"
                 title="You must be signed in to make or propose changes">Edit</a>
          <a href="/tutsplus/webgl-textures-particles/raw/master/final-result/main.js" class="button minibutton " id="raw-url">Raw</a>
            <a href="/tutsplus/webgl-textures-particles/blame/master/final-result/main.js" class="button minibutton ">Blame</a>
          <a href="/tutsplus/webgl-textures-particles/commits/master/final-result/main.js" class="button minibutton " rel="nofollow">History</a>
        </div><!-- /.button-group -->
          <a class="minibutton danger disabled empty-icon tooltipped leftwards" href="#"
             title="You must be signed in and on a branch to make or propose changes">
          Delete
        </a>
      </div><!-- /.actions -->

    </div>
        <div class="blob-wrapper data type-javascript js-blob-data">
        <table class="file-code file-diff">
          <tr class="file-code-line">
            <td class="blob-line-nums">
              <span id="L1" rel="#L1">1</span>
<span id="L2" rel="#L2">2</span>
<span id="L3" rel="#L3">3</span>
<span id="L4" rel="#L4">4</span>
<span id="L5" rel="#L5">5</span>
<span id="L6" rel="#L6">6</span>
<span id="L7" rel="#L7">7</span>
<span id="L8" rel="#L8">8</span>
<span id="L9" rel="#L9">9</span>
<span id="L10" rel="#L10">10</span>
<span id="L11" rel="#L11">11</span>
<span id="L12" rel="#L12">12</span>
<span id="L13" rel="#L13">13</span>
<span id="L14" rel="#L14">14</span>
<span id="L15" rel="#L15">15</span>
<span id="L16" rel="#L16">16</span>
<span id="L17" rel="#L17">17</span>
<span id="L18" rel="#L18">18</span>
<span id="L19" rel="#L19">19</span>
<span id="L20" rel="#L20">20</span>
<span id="L21" rel="#L21">21</span>
<span id="L22" rel="#L22">22</span>
<span id="L23" rel="#L23">23</span>
<span id="L24" rel="#L24">24</span>
<span id="L25" rel="#L25">25</span>
<span id="L26" rel="#L26">26</span>
<span id="L27" rel="#L27">27</span>
<span id="L28" rel="#L28">28</span>
<span id="L29" rel="#L29">29</span>
<span id="L30" rel="#L30">30</span>
<span id="L31" rel="#L31">31</span>
<span id="L32" rel="#L32">32</span>
<span id="L33" rel="#L33">33</span>
<span id="L34" rel="#L34">34</span>
<span id="L35" rel="#L35">35</span>
<span id="L36" rel="#L36">36</span>
<span id="L37" rel="#L37">37</span>
<span id="L38" rel="#L38">38</span>
<span id="L39" rel="#L39">39</span>
<span id="L40" rel="#L40">40</span>
<span id="L41" rel="#L41">41</span>
<span id="L42" rel="#L42">42</span>
<span id="L43" rel="#L43">43</span>
<span id="L44" rel="#L44">44</span>
<span id="L45" rel="#L45">45</span>
<span id="L46" rel="#L46">46</span>
<span id="L47" rel="#L47">47</span>
<span id="L48" rel="#L48">48</span>
<span id="L49" rel="#L49">49</span>
<span id="L50" rel="#L50">50</span>
<span id="L51" rel="#L51">51</span>
<span id="L52" rel="#L52">52</span>
<span id="L53" rel="#L53">53</span>
<span id="L54" rel="#L54">54</span>
<span id="L55" rel="#L55">55</span>
<span id="L56" rel="#L56">56</span>
<span id="L57" rel="#L57">57</span>
<span id="L58" rel="#L58">58</span>
<span id="L59" rel="#L59">59</span>
<span id="L60" rel="#L60">60</span>
<span id="L61" rel="#L61">61</span>
<span id="L62" rel="#L62">62</span>
<span id="L63" rel="#L63">63</span>
<span id="L64" rel="#L64">64</span>
<span id="L65" rel="#L65">65</span>
<span id="L66" rel="#L66">66</span>
<span id="L67" rel="#L67">67</span>
<span id="L68" rel="#L68">68</span>
<span id="L69" rel="#L69">69</span>
<span id="L70" rel="#L70">70</span>
<span id="L71" rel="#L71">71</span>
<span id="L72" rel="#L72">72</span>
<span id="L73" rel="#L73">73</span>
<span id="L74" rel="#L74">74</span>
<span id="L75" rel="#L75">75</span>
<span id="L76" rel="#L76">76</span>
<span id="L77" rel="#L77">77</span>
<span id="L78" rel="#L78">78</span>
<span id="L79" rel="#L79">79</span>
<span id="L80" rel="#L80">80</span>
<span id="L81" rel="#L81">81</span>
<span id="L82" rel="#L82">82</span>
<span id="L83" rel="#L83">83</span>
<span id="L84" rel="#L84">84</span>
<span id="L85" rel="#L85">85</span>
<span id="L86" rel="#L86">86</span>
<span id="L87" rel="#L87">87</span>
<span id="L88" rel="#L88">88</span>
<span id="L89" rel="#L89">89</span>
<span id="L90" rel="#L90">90</span>

            </td>
            <td class="blob-line-code">
                    <div class="code-body highlight"><pre><div class='line' id='LC1'><span class="kd">var</span> <span class="nx">width</span> <span class="o">=</span> <span class="nb">window</span><span class="p">.</span><span class="nx">innerWidth</span><span class="p">;</span></div><div class='line' id='LC2'><span class="kd">var</span> <span class="nx">height</span> <span class="o">=</span> <span class="nb">window</span><span class="p">.</span><span class="nx">innerHeight</span><span class="p">;</span></div><div class='line' id='LC3'><br/></div><div class='line' id='LC4'><span class="kd">var</span> <span class="nx">renderer</span> <span class="o">=</span> <span class="k">new</span> <span class="nx">THREE</span><span class="p">.</span><span class="nx">WebGLRenderer</span><span class="p">({</span> <span class="nx">antialias</span><span class="o">:</span> <span class="kc">true</span> <span class="p">});</span></div><div class='line' id='LC5'><span class="nx">renderer</span><span class="p">.</span><span class="nx">setSize</span><span class="p">(</span><span class="nx">width</span><span class="p">,</span> <span class="nx">height</span><span class="p">);</span></div><div class='line' id='LC6'><span class="nb">document</span><span class="p">.</span><span class="nx">body</span><span class="p">.</span><span class="nx">appendChild</span><span class="p">(</span><span class="nx">renderer</span><span class="p">.</span><span class="nx">domElement</span><span class="p">);</span></div><div class='line' id='LC7'><br/></div><div class='line' id='LC8'><span class="kd">var</span> <span class="nx">scene</span> <span class="o">=</span> <span class="k">new</span> <span class="nx">THREE</span><span class="p">.</span><span class="nx">Scene</span><span class="p">;</span></div><div class='line' id='LC9'><br/></div><div class='line' id='LC10'><span class="kd">var</span> <span class="nx">cubeGeometry</span> <span class="o">=</span> <span class="k">new</span> <span class="nx">THREE</span><span class="p">.</span><span class="nx">CubeGeometry</span><span class="p">(</span><span class="mi">100</span><span class="p">,</span> <span class="mi">100</span><span class="p">,</span> <span class="mi">100</span><span class="p">);</span></div><div class='line' id='LC11'><span class="kd">var</span> <span class="nx">cubeTexture</span> <span class="o">=</span> <span class="nx">THREE</span><span class="p">.</span><span class="nx">ImageUtils</span><span class="p">.</span><span class="nx">loadTexture</span><span class="p">(</span><span class="s1">&#39;./box.png&#39;</span><span class="p">);</span></div><div class='line' id='LC12'><span class="kd">var</span> <span class="nx">materials</span> <span class="o">=</span> <span class="p">[];</span></div><div class='line' id='LC13'><span class="nx">materials</span><span class="p">.</span><span class="nx">push</span><span class="p">(</span><span class="k">new</span> <span class="nx">THREE</span><span class="p">.</span><span class="nx">MeshLambertMaterial</span><span class="p">({</span> <span class="nx">map</span><span class="o">:</span> <span class="nx">cubeTexture</span><span class="p">,</span> <span class="nx">color</span><span class="o">:</span> <span class="mh">0xff0000</span> <span class="p">}));</span> <span class="c1">//right</span></div><div class='line' id='LC14'><span class="nx">materials</span><span class="p">.</span><span class="nx">push</span><span class="p">(</span><span class="k">new</span> <span class="nx">THREE</span><span class="p">.</span><span class="nx">MeshLambertMaterial</span><span class="p">({</span> <span class="nx">map</span><span class="o">:</span> <span class="nx">cubeTexture</span><span class="p">,</span> <span class="nx">color</span><span class="o">:</span> <span class="mh">0xffff00</span> <span class="p">}));</span> <span class="c1">//left</span></div><div class='line' id='LC15'><span class="nx">materials</span><span class="p">.</span><span class="nx">push</span><span class="p">(</span><span class="k">new</span> <span class="nx">THREE</span><span class="p">.</span><span class="nx">MeshLambertMaterial</span><span class="p">({</span> <span class="nx">map</span><span class="o">:</span> <span class="nx">cubeTexture</span><span class="p">,</span> <span class="nx">color</span><span class="o">:</span> <span class="mh">0xffffff</span> <span class="p">}));</span> <span class="c1">//top</span></div><div class='line' id='LC16'><span class="nx">materials</span><span class="p">.</span><span class="nx">push</span><span class="p">(</span><span class="k">new</span> <span class="nx">THREE</span><span class="p">.</span><span class="nx">MeshLambertMaterial</span><span class="p">({</span> <span class="nx">map</span><span class="o">:</span> <span class="nx">cubeTexture</span><span class="p">,</span> <span class="nx">color</span><span class="o">:</span> <span class="mh">0x00ffff</span> <span class="p">}));</span> <span class="c1">//bottom</span></div><div class='line' id='LC17'><span class="nx">materials</span><span class="p">.</span><span class="nx">push</span><span class="p">(</span><span class="k">new</span> <span class="nx">THREE</span><span class="p">.</span><span class="nx">MeshLambertMaterial</span><span class="p">({</span> <span class="nx">map</span><span class="o">:</span> <span class="nx">cubeTexture</span><span class="p">,</span> <span class="nx">color</span><span class="o">:</span> <span class="mh">0x0000ff</span> <span class="p">}));</span> <span class="c1">//front</span></div><div class='line' id='LC18'><span class="nx">materials</span><span class="p">.</span><span class="nx">push</span><span class="p">(</span><span class="k">new</span> <span class="nx">THREE</span><span class="p">.</span><span class="nx">MeshLambertMaterial</span><span class="p">({</span> <span class="nx">map</span><span class="o">:</span> <span class="nx">cubeTexture</span><span class="p">,</span> <span class="nx">color</span><span class="o">:</span> <span class="mh">0xff00ff</span> <span class="p">}));</span> <span class="c1">//back</span></div><div class='line' id='LC19'><span class="kd">var</span> <span class="nx">cubeMaterial</span> <span class="o">=</span> <span class="k">new</span> <span class="nx">THREE</span><span class="p">.</span><span class="nx">MeshFaceMaterial</span><span class="p">(</span><span class="nx">materials</span><span class="p">);</span></div><div class='line' id='LC20'><span class="kd">var</span> <span class="nx">cube</span> <span class="o">=</span> <span class="k">new</span> <span class="nx">THREE</span><span class="p">.</span><span class="nx">Mesh</span><span class="p">(</span><span class="nx">cubeGeometry</span><span class="p">,</span> <span class="nx">cubeMaterial</span><span class="p">);</span></div><div class='line' id='LC21'><span class="c1">//cube.rotation.y = Math.PI * 45 / 180;</span></div><div class='line' id='LC22'><span class="nx">scene</span><span class="p">.</span><span class="nx">add</span><span class="p">(</span><span class="nx">cube</span><span class="p">);</span></div><div class='line' id='LC23'><br/></div><div class='line' id='LC24'><span class="kd">var</span> <span class="nx">camera</span> <span class="o">=</span> <span class="k">new</span> <span class="nx">THREE</span><span class="p">.</span><span class="nx">PerspectiveCamera</span><span class="p">(</span><span class="mi">45</span><span class="p">,</span> <span class="nx">width</span> <span class="o">/</span> <span class="nx">height</span><span class="p">,</span> <span class="mf">0.1</span><span class="p">,</span> <span class="mi">10000</span><span class="p">);</span></div><div class='line' id='LC25'><span class="nx">camera</span><span class="p">.</span><span class="nx">position</span><span class="p">.</span><span class="nx">y</span> <span class="o">=</span> <span class="mi">160</span><span class="p">;</span></div><div class='line' id='LC26'><span class="nx">camera</span><span class="p">.</span><span class="nx">position</span><span class="p">.</span><span class="nx">z</span> <span class="o">=</span> <span class="mi">400</span><span class="p">;</span></div><div class='line' id='LC27'><span class="nx">camera</span><span class="p">.</span><span class="nx">lookAt</span><span class="p">(</span><span class="nx">cube</span><span class="p">.</span><span class="nx">position</span><span class="p">);</span></div><div class='line' id='LC28'><br/></div><div class='line' id='LC29'><span class="nx">scene</span><span class="p">.</span><span class="nx">add</span><span class="p">(</span><span class="nx">camera</span><span class="p">);</span></div><div class='line' id='LC30'><br/></div><div class='line' id='LC31'><span class="kd">var</span> <span class="nx">skyboxGeometry</span> <span class="o">=</span> <span class="k">new</span> <span class="nx">THREE</span><span class="p">.</span><span class="nx">CubeGeometry</span><span class="p">(</span><span class="mi">10000</span><span class="p">,</span> <span class="mi">10000</span><span class="p">,</span> <span class="mi">10000</span><span class="p">);</span></div><div class='line' id='LC32'><span class="kd">var</span> <span class="nx">skyboxMaterial</span> <span class="o">=</span> <span class="k">new</span> <span class="nx">THREE</span><span class="p">.</span><span class="nx">MeshBasicMaterial</span><span class="p">({</span> <span class="nx">color</span><span class="o">:</span> <span class="mh">0x000000</span><span class="p">,</span> <span class="nx">side</span><span class="o">:</span> <span class="nx">THREE</span><span class="p">.</span><span class="nx">BackSide</span> <span class="p">});</span></div><div class='line' id='LC33'><span class="kd">var</span> <span class="nx">skybox</span> <span class="o">=</span> <span class="k">new</span> <span class="nx">THREE</span><span class="p">.</span><span class="nx">Mesh</span><span class="p">(</span><span class="nx">skyboxGeometry</span><span class="p">,</span> <span class="nx">skyboxMaterial</span><span class="p">);</span></div><div class='line' id='LC34'><br/></div><div class='line' id='LC35'><span class="nx">scene</span><span class="p">.</span><span class="nx">add</span><span class="p">(</span><span class="nx">skybox</span><span class="p">);</span></div><div class='line' id='LC36'><br/></div><div class='line' id='LC37'><span class="kd">var</span> <span class="nx">particles</span> <span class="o">=</span> <span class="k">new</span> <span class="nx">THREE</span><span class="p">.</span><span class="nx">Geometry</span><span class="p">;</span></div><div class='line' id='LC38'><span class="k">for</span> <span class="p">(</span><span class="kd">var</span> <span class="nx">p</span> <span class="o">=</span> <span class="mi">0</span><span class="p">;</span> <span class="nx">p</span> <span class="o">&lt;</span> <span class="mi">2000</span><span class="p">;</span> <span class="nx">p</span><span class="o">++</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC39'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="kd">var</span> <span class="nx">particle</span> <span class="o">=</span> <span class="k">new</span> <span class="nx">THREE</span><span class="p">.</span><span class="nx">Vector3</span><span class="p">(</span><span class="nb">Math</span><span class="p">.</span><span class="nx">random</span><span class="p">()</span> <span class="o">*</span> <span class="mi">500</span> <span class="o">-</span> <span class="mi">250</span><span class="p">,</span> <span class="nb">Math</span><span class="p">.</span><span class="nx">random</span><span class="p">()</span> <span class="o">*</span> <span class="mi">500</span> <span class="o">-</span> <span class="mi">250</span><span class="p">,</span> <span class="nb">Math</span><span class="p">.</span><span class="nx">random</span><span class="p">()</span> <span class="o">*</span> <span class="mi">500</span> <span class="o">-</span> <span class="mi">250</span><span class="p">);</span></div><div class='line' id='LC40'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nx">particles</span><span class="p">.</span><span class="nx">vertices</span><span class="p">.</span><span class="nx">push</span><span class="p">(</span><span class="nx">particle</span><span class="p">);</span></div><div class='line' id='LC41'><span class="p">}</span></div><div class='line' id='LC42'><span class="kd">var</span> <span class="nx">particleTexture</span> <span class="o">=</span> <span class="nx">THREE</span><span class="p">.</span><span class="nx">ImageUtils</span><span class="p">.</span><span class="nx">loadTexture</span><span class="p">(</span><span class="s1">&#39;./snowflake.png&#39;</span><span class="p">);</span></div><div class='line' id='LC43'><span class="kd">var</span> <span class="nx">particleMaterial</span> <span class="o">=</span> <span class="k">new</span> <span class="nx">THREE</span><span class="p">.</span><span class="nx">ParticleBasicMaterial</span><span class="p">({</span> <span class="nx">map</span><span class="o">:</span> <span class="nx">particleTexture</span><span class="p">,</span> <span class="nx">transparent</span><span class="o">:</span> <span class="kc">true</span><span class="p">,</span> <span class="nx">size</span><span class="o">:</span> <span class="mi">5</span> <span class="p">});</span></div><div class='line' id='LC44'><span class="kd">var</span> <span class="nx">particleSystem</span> <span class="o">=</span> <span class="k">new</span> <span class="nx">THREE</span><span class="p">.</span><span class="nx">ParticleSystem</span><span class="p">(</span><span class="nx">particles</span><span class="p">,</span> <span class="nx">particleMaterial</span><span class="p">);</span></div><div class='line' id='LC45'><br/></div><div class='line' id='LC46'><span class="nx">scene</span><span class="p">.</span><span class="nx">add</span><span class="p">(</span><span class="nx">particleSystem</span><span class="p">);</span></div><div class='line' id='LC47'><br/></div><div class='line' id='LC48'><span class="kd">var</span> <span class="nx">smokeParticles</span> <span class="o">=</span> <span class="k">new</span> <span class="nx">THREE</span><span class="p">.</span><span class="nx">Geometry</span><span class="p">;</span></div><div class='line' id='LC49'><span class="k">for</span> <span class="p">(</span><span class="kd">var</span> <span class="nx">i</span> <span class="o">=</span> <span class="mi">0</span><span class="p">;</span> <span class="nx">i</span> <span class="o">&lt;</span> <span class="mi">300</span><span class="p">;</span> <span class="nx">i</span><span class="o">++</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC50'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="kd">var</span> <span class="nx">particle</span> <span class="o">=</span> <span class="k">new</span> <span class="nx">THREE</span><span class="p">.</span><span class="nx">Vector3</span><span class="p">(</span><span class="nb">Math</span><span class="p">.</span><span class="nx">random</span><span class="p">()</span> <span class="o">*</span> <span class="mi">32</span> <span class="o">-</span> <span class="mi">16</span><span class="p">,</span> <span class="nb">Math</span><span class="p">.</span><span class="nx">random</span><span class="p">()</span> <span class="o">*</span> <span class="mi">230</span><span class="p">,</span> <span class="nb">Math</span><span class="p">.</span><span class="nx">random</span><span class="p">()</span> <span class="o">*</span> <span class="mi">32</span> <span class="o">-</span> <span class="mi">16</span><span class="p">);</span></div><div class='line' id='LC51'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nx">smokeParticles</span><span class="p">.</span><span class="nx">vertices</span><span class="p">.</span><span class="nx">push</span><span class="p">(</span><span class="nx">particle</span><span class="p">);</span></div><div class='line' id='LC52'><span class="p">}</span></div><div class='line' id='LC53'><span class="kd">var</span> <span class="nx">smokeTexture</span> <span class="o">=</span> <span class="nx">THREE</span><span class="p">.</span><span class="nx">ImageUtils</span><span class="p">.</span><span class="nx">loadTexture</span><span class="p">(</span><span class="s1">&#39;./smoke.png&#39;</span><span class="p">);</span></div><div class='line' id='LC54'><span class="kd">var</span> <span class="nx">smokeMaterial</span> <span class="o">=</span> <span class="k">new</span> <span class="nx">THREE</span><span class="p">.</span><span class="nx">ParticleBasicMaterial</span><span class="p">({</span> <span class="nx">map</span><span class="o">:</span> <span class="nx">smokeTexture</span><span class="p">,</span> <span class="nx">transparent</span><span class="o">:</span> <span class="kc">true</span><span class="p">,</span> <span class="nx">blending</span><span class="o">:</span> <span class="nx">THREE</span><span class="p">.</span><span class="nx">AdditiveBlending</span><span class="p">,</span> <span class="nx">size</span><span class="o">:</span> <span class="mi">50</span><span class="p">,</span> <span class="nx">color</span><span class="o">:</span> <span class="mh">0x111111</span> <span class="p">});</span></div><div class='line' id='LC55'><span class="kd">var</span> <span class="nx">smoke</span> <span class="o">=</span> <span class="k">new</span> <span class="nx">THREE</span><span class="p">.</span><span class="nx">ParticleSystem</span><span class="p">(</span><span class="nx">smokeParticles</span><span class="p">,</span> <span class="nx">smokeMaterial</span><span class="p">);</span></div><div class='line' id='LC56'><span class="nx">smoke</span><span class="p">.</span><span class="nx">sortParticles</span> <span class="o">=</span> <span class="kc">true</span><span class="p">;</span></div><div class='line' id='LC57'><span class="nx">smoke</span><span class="p">.</span><span class="nx">position</span><span class="p">.</span><span class="nx">x</span> <span class="o">=</span> <span class="o">-</span><span class="mi">150</span><span class="p">;</span></div><div class='line' id='LC58'><br/></div><div class='line' id='LC59'><span class="nx">scene</span><span class="p">.</span><span class="nx">add</span><span class="p">(</span><span class="nx">smoke</span><span class="p">);</span></div><div class='line' id='LC60'><br/></div><div class='line' id='LC61'><span class="kd">var</span> <span class="nx">pointLight</span> <span class="o">=</span> <span class="k">new</span> <span class="nx">THREE</span><span class="p">.</span><span class="nx">PointLight</span><span class="p">(</span><span class="mh">0xffffff</span><span class="p">);</span></div><div class='line' id='LC62'><span class="nx">pointLight</span><span class="p">.</span><span class="nx">position</span><span class="p">.</span><span class="nx">set</span><span class="p">(</span><span class="mi">0</span><span class="p">,</span> <span class="mi">300</span><span class="p">,</span> <span class="mi">200</span><span class="p">);</span></div><div class='line' id='LC63'><br/></div><div class='line' id='LC64'><span class="nx">scene</span><span class="p">.</span><span class="nx">add</span><span class="p">(</span><span class="nx">pointLight</span><span class="p">);</span></div><div class='line' id='LC65'><br/></div><div class='line' id='LC66'><span class="kd">var</span> <span class="nx">clock</span> <span class="o">=</span> <span class="k">new</span> <span class="nx">THREE</span><span class="p">.</span><span class="nx">Clock</span><span class="p">;</span></div><div class='line' id='LC67'><br/></div><div class='line' id='LC68'><span class="kd">function</span> <span class="nx">render</span><span class="p">()</span> <span class="p">{</span></div><div class='line' id='LC69'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nx">requestAnimationFrame</span><span class="p">(</span><span class="nx">render</span><span class="p">);</span></div><div class='line' id='LC70'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div><div class='line' id='LC71'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="kd">var</span> <span class="nx">delta</span> <span class="o">=</span> <span class="nx">clock</span><span class="p">.</span><span class="nx">getDelta</span><span class="p">();</span></div><div class='line' id='LC72'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nx">cube</span><span class="p">.</span><span class="nx">rotation</span><span class="p">.</span><span class="nx">y</span> <span class="o">-=</span> <span class="nx">delta</span><span class="p">;</span></div><div class='line' id='LC73'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nx">particleSystem</span><span class="p">.</span><span class="nx">rotation</span><span class="p">.</span><span class="nx">y</span> <span class="o">+=</span> <span class="nx">delta</span><span class="p">;</span></div><div class='line' id='LC74'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div><div class='line' id='LC75'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="kd">var</span> <span class="nx">particleCount</span> <span class="o">=</span> <span class="nx">smokeParticles</span><span class="p">.</span><span class="nx">vertices</span><span class="p">.</span><span class="nx">length</span><span class="p">;</span></div><div class='line' id='LC76'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">while</span> <span class="p">(</span><span class="nx">particleCount</span><span class="o">--</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC77'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="kd">var</span> <span class="nx">particle</span> <span class="o">=</span> <span class="nx">smokeParticles</span><span class="p">.</span><span class="nx">vertices</span><span class="p">[</span><span class="nx">particleCount</span><span class="p">];</span></div><div class='line' id='LC78'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nx">particle</span><span class="p">.</span><span class="nx">y</span> <span class="o">+=</span> <span class="nx">delta</span> <span class="o">*</span> <span class="mi">50</span><span class="p">;</span></div><div class='line' id='LC79'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="k">if</span> <span class="p">(</span><span class="nx">particle</span><span class="p">.</span><span class="nx">y</span> <span class="o">&gt;=</span> <span class="mi">230</span><span class="p">)</span> <span class="p">{</span></div><div class='line' id='LC80'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nx">particle</span><span class="p">.</span><span class="nx">y</span> <span class="o">=</span> <span class="nb">Math</span><span class="p">.</span><span class="nx">random</span><span class="p">()</span> <span class="o">*</span> <span class="mi">16</span><span class="p">;</span></div><div class='line' id='LC81'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nx">particle</span><span class="p">.</span><span class="nx">x</span> <span class="o">=</span> <span class="nb">Math</span><span class="p">.</span><span class="nx">random</span><span class="p">()</span> <span class="o">*</span> <span class="mi">32</span> <span class="o">-</span> <span class="mi">16</span><span class="p">;</span></div><div class='line' id='LC82'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nx">particle</span><span class="p">.</span><span class="nx">z</span> <span class="o">=</span> <span class="nb">Math</span><span class="p">.</span><span class="nx">random</span><span class="p">()</span> <span class="o">*</span> <span class="mi">32</span> <span class="o">-</span> <span class="mi">16</span><span class="p">;</span></div><div class='line' id='LC83'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC84'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="p">}</span></div><div class='line' id='LC85'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nx">smokeParticles</span><span class="p">.</span><span class="nx">__dirtyVertices</span> <span class="o">=</span> <span class="kc">true</span><span class="p">;</span></div><div class='line' id='LC86'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div><div class='line' id='LC87'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="nx">renderer</span><span class="p">.</span><span class="nx">render</span><span class="p">(</span><span class="nx">scene</span><span class="p">,</span> <span class="nx">camera</span><span class="p">);</span></div><div class='line' id='LC88'><span class="p">}</span></div><div class='line' id='LC89'><br/></div><div class='line' id='LC90'><span class="nx">render</span><span class="p">();</span></div></pre></div>
            </td>
          </tr>
        </table>
  </div>

  </div>
</div>

<a href="#jump-to-line" rel="facebox[.linejump]" data-hotkey="l" class="js-jump-to-line" style="display:none">Jump to Line</a>
<div id="jump-to-line" style="display:none">
  <form accept-charset="UTF-8" class="js-jump-to-line-form">
    <input class="linejump-input js-jump-to-line-field" type="text" placeholder="Jump to line&hellip;" autofocus>
    <button type="submit" class="button">Go</button>
  </form>
</div>

        </div>

      </div><!-- /.repo-container -->
      <div class="modal-backdrop"></div>
    </div><!-- /.container -->
  </div><!-- /.site -->


    </div><!-- /.wrapper -->

      <div class="container">
  <div class="site-footer">
    <ul class="site-footer-links right">
      <li><a href="https://status.github.com/">Status</a></li>
      <li><a href="http://developer.github.com">API</a></li>
      <li><a href="http://training.github.com">Training</a></li>
      <li><a href="http://shop.github.com">Shop</a></li>
      <li><a href="/blog">Blog</a></li>
      <li><a href="/about">About</a></li>

    </ul>

    <a href="/">
      <span class="mega-octicon octicon-mark-github"></span>
    </a>

    <ul class="site-footer-links">
      <li>&copy; 2013 <span title="0.02220s from github-fe119-cp1-prd.iad.github.net">GitHub</span>, Inc.</li>
        <li><a href="/site/terms">Terms</a></li>
        <li><a href="/site/privacy">Privacy</a></li>
        <li><a href="/security">Security</a></li>
        <li><a href="/contact">Contact</a></li>
    </ul>
  </div><!-- /.site-footer -->
</div><!-- /.container -->


    <div class="fullscreen-overlay js-fullscreen-overlay" id="fullscreen_overlay">
  <div class="fullscreen-container js-fullscreen-container">
    <div class="textarea-wrap">
      <textarea name="fullscreen-contents" id="fullscreen-contents" class="js-fullscreen-contents" placeholder="" data-suggester="fullscreen_suggester"></textarea>
          <div class="suggester-container">
              <div class="suggester fullscreen-suggester js-navigation-container" id="fullscreen_suggester"
                 data-url="/tutsplus/webgl-textures-particles/suggestions/commit">
              </div>
          </div>
    </div>
  </div>
  <div class="fullscreen-sidebar">
    <a href="#" class="exit-fullscreen js-exit-fullscreen tooltipped leftwards" title="Exit Zen Mode">
      <span class="mega-octicon octicon-screen-normal"></span>
    </a>
    <a href="#" class="theme-switcher js-theme-switcher tooltipped leftwards"
      title="Switch themes">
      <span class="octicon octicon-color-mode"></span>
    </a>
  </div>
</div>



    <div id="ajax-error-message" class="flash flash-error">
      <span class="octicon octicon-alert"></span>
      <a href="#" class="octicon octicon-remove-close close ajax-error-dismiss"></a>
      Something went wrong with that request. Please try again.
    </div>

  </body>
</html>

