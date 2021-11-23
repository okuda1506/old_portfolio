<?php 
session_start();

//クリックジャッキング対策
header('X-FRAME-OPTIONS: DENY');

if(isset($_POST['check']) && !empty($_POST)) {
  if($_POST['name'] == '') {
    $error['name'] = 'blank';
  }
  if($_POST['email'] == '') {
    $error['email'] = 'blank';
  }
  if($_POST['message'] == '') {
    $error['message'] = 'blank';
  }

  if(empty($error)) {
    $_SESSION['send'] = $_POST;
    $token = bin2hex(random_bytes(32));   //トークン生成
    $_SESSION["token"] = $token;
    header('Location: checkContact.php');
    exit();
  }
}

if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'rewrite') {
  $_POST = $_SESSION['send'];
  $error['rewrite'] = true;
}

function h($str) {
  return htmlspecialchars($str, ENT_QUOTES);
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TAKUYA OKUDA PORTFOLIO</title>
  <meta name="description" content="TAKUYA OKUDA PORTFOLIO">

  <!-- CSS -->
  <link rel = "stylesheet" href = "https://unpkg.com/ress/dist/ress.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="icon" href="img/favicon.ico">
</head>
<body>
  <!-- header -->
  <header class="header">
    <div class="inner">
      <h1 class="header-logo">
        <a href="#">TAKUYA OKUDA</a>
      </h1>
      <div class="nav-wrapper">
        <nav class="header-nav">
          <ul class="nav-list">
            <li class="nav-item"><a href="#works">WORKS</a></li>
            <li class="nav-item"><a href="#skill">SKILLS</a></li>
            <li class="nav-item"><a href="#about">ABOUT</a></li>
            <li class="nav-item"><a href="#contact">CONTACT</a></li>
          </ul>
        </nav>
      </div>
      <div class="burger-btn"><!-- ハンバーガーボタン -->
        <span class="bar bar_top"></span>
        <span class="bar bar_mid"></span>
        <span class="bar bar_bottom"></span>
      </div>
    </div>
    </header>
  <!-- /header -->

  <!-- main-visual -->
  <div class="big-bg">
    <div class="main-visual">
      <p class="main-visual-title">TAKUYA OKUDA</p>
      <p class="main-visual-subtitle">PORTFOLIO</p>
    </div>
  </div>
  <!-- /main-visual -->

  <!-- works -->
  <div class="works wrapper" id="works">
    <h2 class="title fade-in">WORKS</h2>
    <div class="works-list">
      <div class="works-outline" id="row-space">
        <a class="works-item fade-in" href="works/cresta/cresta.html" target="_blank" rel="noopener noreferrer">
          <div class="works-img">
            <img src="img/CrestaDesign.png">
          </div>
          <p class="works-name">架空デザインサイト(HTML, CSS)</p>
        </a>
        <a class="works-item fade-in" href="works/wcb/wcb.html" target="_blank" rel="noopener noreferrer">
          <div class="works-img">
            <img src="img/WCB-CAFE.png">
          </div>
          <p class="works-name">架空カフェサイト(HTML, CSS)</p>
        </a>
      </div>
      <div class="works-outline" id="row-space">
          <a class="works-item fade-in" href="works/corporate/corporate.html" target="_blank" rel="noopener noreferrer">
            <div class="works-img">
              <img src="img/corporate.png">
            </div>
            <p class="works-name">架空コーポレートサイト(HTML, CSS, JavaScript)</p>   
          </a>
        <a class="works-item fade-in" href="works/bulletinBoard/post/index.php" target="_blank" rel="noopener noreferrer">
          <div class="works-img">
            <img src="img/bulletinboard.png">
          </div>
          <p class="works-name">ひとこと掲示板サイト(PHP, MySQL)</p>
        </a>
      </div>
      <div class="works-outline">
          <a class="works-item fade-in" href="index.php" target="_blank" rel="noopener noreferrer">
            <div class="works-img">
              <img src="img/portfolio.png">
            </div>
            <p class="works-name">ポートフォリオ(PHP, jQuery)</p>   
          </a>
          <a class="works-item" href="index.php" target="_blank" rel="noopener noreferrer" id="hidden">
            <div class="works-img">
              <img src="img/portfolio.png">
            </div>
            <p class="works-name">ポートフォリオ(PHP, jQuery)</p>   
          </a>
      </div>
    </div>
  </div>
  <!-- /works -->

  <!-- skill -->
  <div class="skill wrapper" id="skill">
    <h2 class="title fade-in">SKILLS</h2>
    <div class="skill-container">
      <div class="skill-item fade-in">
        <p class="skill-img"><svg viewBox="0 0 128 128" width="70px" height="70px">
          <path fill="#E44D26" d="M9.032 2l10.005 112.093 44.896 12.401 45.02-12.387 10.015-112.107h-109.936zm89.126 26.539l-.627 7.172-.276 3.289h-52.665000000000006l1.257 14h50.156000000000006l-.336 3.471-3.233 36.119-.238 2.27-28.196 7.749v.002l-.034.018-28.177-7.423-1.913-21.206h13.815000000000001l.979 10.919 15.287 4.081h.043v-.546l15.355-3.875 1.604-17.579h-47.698l-3.383-38.117-.329-3.883h68.939l-.33 3.539z"></path>
          </svg>
        </p>
        <div class="skill-body">
          <h3 class="skill-name">HTML5 / CSS3</h3>
          <p class="skill-text">
            基本的なタグや、レスポンシブ対応を含めたスタイリングは問題なくこなせます。また、制作時は保守性を考慮したコーディングを心掛けています。使用エディタはVisual Studio Codeです。
          </p>
        </div>
      </div>
      <div class="skill-item fade-in">
        <p class="skill-img"><svg viewBox="0 0 128 128" width="70px" height="70px">
          <path fill="#F0DB4F" d="M2 1v125h125v-125h-125zm66.119 106.513c-1.845 3.749-5.367 6.212-9.448 7.401-6.271 1.44-12.269.619-16.731-2.059-2.986-1.832-5.318-4.652-6.901-7.901l9.52-5.83c.083.035.333.487.667 1.071 1.214 2.034 2.261 3.474 4.319 4.485 2.022.69 6.461 1.131 8.175-2.427 1.047-1.81.714-7.628.714-14.065-.001-10.115.046-20.188.046-30.188h11.709c0 11 .06 21.418 0 32.152.025 6.58.596 12.446-2.07 17.361zm48.574-3.308c-4.07 13.922-26.762 14.374-35.83 5.176-1.916-2.165-3.117-3.296-4.26-5.795 4.819-2.772 4.819-2.772 9.508-5.485 2.547 3.915 4.902 6.068 9.139 6.949 5.748.702 11.531-1.273 10.234-7.378-1.333-4.986-11.77-6.199-18.873-11.531-7.211-4.843-8.901-16.611-2.975-23.335 1.975-2.487 5.343-4.343 8.877-5.235l3.688-.477c7.081-.143 11.507 1.727 14.756 5.355.904.916 1.642 1.904 3.022 4.045-3.772 2.404-3.76 2.381-9.163 5.879-1.154-2.486-3.069-4.046-5.093-4.724-3.142-.952-7.104.083-7.926 3.403-.285 1.023-.226 1.975.227 3.665 1.273 2.903 5.545 4.165 9.377 5.926 11.031 4.474 14.756 9.271 15.672 14.981.882 4.916-.213 8.105-.38 8.581z"></path>
          </svg>
        </p>
        <div class="skill-body">
          <h3 class="skill-name">JavaScript</h3>
          <p class="skill-text">
            現在、制作で扱えるレベルまで行けるよう勉強中です。jQueryに関しては、ライブラリの実装や基本的なコードは問題なく書けます。
          </p>
        </div>
      </div>
    </div> 

    <div class="skill-container">
      <div class="skill-item fade-in">
        <p class="skill-img"><svg viewBox="0 0 128 128" width="70px" height="70px">
          <path fill="#6181B6" d="M64 33.039C30.26 33.039 2.906 46.901 2.906 64S30.26 94.961 64 94.961 125.094 81.099 125.094 64 97.74 33.039 64 33.039zM48.103 70.032c-1.458 1.364-3.077 1.927-4.86 2.507-1.783.581-4.052.461-6.811.461h-6.253l-1.733 10h-7.301l6.515-34H41.7c4.224 0 7.305 1.215 9.242 3.432 1.937 2.217 2.519 5.364 1.747 9.337-.319 1.637-.856 3.159-1.614 4.515a15.118 15.118 0 01-2.972 3.748zM69.414 73l2.881-14.42c.328-1.688.208-2.942-.361-3.555-.57-.614-1.782-1.025-3.635-1.025h-5.79l-3.731 19h-7.244l6.515-33h7.244l-1.732 9h6.453c4.061 0 6.861.815 8.402 2.231s2.003 3.356 1.387 6.528L76.772 73h-7.358zm40.259-11.178c-.318 1.637-.856 3.133-1.613 4.488-.758 1.357-1.748 2.598-2.971 3.722-1.458 1.364-3.078 1.927-4.86 2.507-1.782.581-4.053.461-6.812.461h-6.253l-1.732 10h-7.301l6.514-34h14.041c4.224 0 7.305 1.215 9.241 3.432 1.935 2.217 2.518 5.418 1.746 9.39zM95.919 54h-5.001l-2.727 14h4.442c2.942 0 5.136-.29 6.576-1.4 1.442-1.108 2.413-2.828 2.918-5.421.484-2.491.264-4.434-.66-5.458-.925-1.024-2.774-1.721-5.548-1.721zm-56.985 0h-5.002l-2.727 14h4.441c2.943 0 5.136-.29 6.577-1.4 1.441-1.108 2.413-2.828 2.917-5.421.484-2.491.264-4.434-.66-5.458S41.708 54 38.934 54z"></path>
          </svg>
        </p>
        <div class="skill-body">
          <h3 class="skill-name">PHP</h3>
          <p class="skill-text">
            基礎知識を応用して、動的なWebページを作成することが出来ます。また、PHPを用いたデータベースの接続やクエリの実行、メール送信等も可能です。現在は、より効率的な実装を行うためにLaravelを学んでいます。
          </p>
        </div> 
      </div>
      <div class="skill-item fade-in">
        <p class="skill-img"><svg viewBox="0 0 128 128" width="70px" height="70px">
          <path fill="#0074BD" d="M52.581 67.817s-3.284 1.911 2.341 2.557c6.814.778 10.297.666 17.805-.753 0 0 1.979 1.237 4.735 2.309-16.836 7.213-38.104-.418-24.881-4.113zm-2.059-9.415s-3.684 2.729 1.945 3.311c7.28.751 13.027.813 22.979-1.103 0 0 1.373 1.396 3.536 2.157-20.352 5.954-43.021.469-28.46-4.365z"></path><path fill="#EA2D2E" d="M67.865 42.431c4.151 4.778-1.088 9.074-1.088 9.074s10.533-5.437 5.696-12.248c-4.519-6.349-7.982-9.502 10.771-20.378.001 0-29.438 7.35-15.379 23.552z"></path><path fill="#0074BD" d="M90.132 74.781s2.432 2.005-2.678 3.555c-9.716 2.943-40.444 3.831-48.979.117-3.066-1.335 2.687-3.187 4.496-3.576 1.887-.409 2.965-.334 2.965-.334-3.412-2.403-22.055 4.719-9.469 6.762 34.324 5.563 62.567-2.506 53.665-6.524zm-35.97-26.134s-15.629 3.713-5.534 5.063c4.264.57 12.758.439 20.676-.225 6.469-.543 12.961-1.704 12.961-1.704s-2.279.978-3.93 2.104c-15.874 4.175-46.533 2.23-37.706-2.038 7.463-3.611 13.533-3.2 13.533-3.2zM82.2 64.317c16.135-8.382 8.674-16.438 3.467-15.353-1.273.266-1.845.496-1.845.496s.475-.744 1.378-1.063c10.302-3.62 18.223 10.681-3.322 16.345 0 0 .247-.224.322-.425z"></path><path fill="#EA2D2E" d="M72.474 1.313s8.935 8.939-8.476 22.682c-13.962 11.027-3.184 17.313-.006 24.498-8.15-7.354-14.128-13.828-10.118-19.852 5.889-8.842 22.204-13.131 18.6-27.328z"></path><path fill="#0074BD" d="M55.749 87.039c15.484.99 39.269-.551 39.832-7.878 0 0-1.082 2.777-12.799 4.981-13.218 2.488-29.523 2.199-39.191.603 0 0 1.98 1.64 12.158 2.294z"></path><path fill="#EA2D2E" d="M94.866 100.181h-.472v-.264h1.27v.264h-.47v1.317h-.329l.001-1.317zm2.535.066h-.006l-.468 1.251h-.216l-.465-1.251h-.005v1.251h-.312v-1.581h.457l.431 1.119.432-1.119h.454v1.581h-.302v-1.251zm-44.19 14.79c-1.46 1.266-3.004 1.978-4.391 1.978-1.974 0-3.045-1.186-3.045-3.085 0-2.055 1.146-3.56 5.738-3.56h1.697v4.667h.001zm4.031 4.548v-14.077c0-3.599-2.053-5.973-6.997-5.973-2.886 0-5.416.714-7.473 1.622l.592 2.493c1.62-.595 3.715-1.147 5.771-1.147 2.85 0 4.075 1.147 4.075 3.521v1.779h-1.424c-6.921 0-10.044 2.685-10.044 6.723 0 3.479 2.058 5.456 5.933 5.456 2.49 0 4.351-1.028 6.088-2.533l.316 2.137h3.163v-.001zm13.452 0h-5.027l-6.051-19.689h4.391l3.756 12.099.835 3.635c1.896-5.258 3.24-10.596 3.912-15.733h4.271c-1.143 6.481-3.203 13.598-6.087 19.688zm19.288-4.548c-1.465 1.266-3.01 1.978-4.392 1.978-1.976 0-3.046-1.186-3.046-3.085 0-2.055 1.149-3.56 5.736-3.56h1.701v4.667h.001zm4.033 4.548v-14.077c0-3.599-2.059-5.973-6.999-5.973-2.889 0-5.418.714-7.475 1.622l.593 2.493c1.62-.595 3.718-1.147 5.774-1.147 2.846 0 4.074 1.147 4.074 3.521v1.779h-1.424c-6.923 0-10.045 2.685-10.045 6.723 0 3.479 2.056 5.456 5.93 5.456 2.491 0 4.349-1.028 6.091-2.533l.318 2.137h3.163v-.001zm-56.693 3.346c-1.147 1.679-3.005 3.008-5.037 3.757l-1.989-2.345c1.547-.794 2.872-2.075 3.489-3.269.532-1.063.753-2.43.753-5.701V92.891h4.284v22.173c0 4.375-.348 6.144-1.5 7.867z"></path>
          </svg>
        </p>
        <div class="skill-body">
          <h3 class="skill-name">Java</h3>
          <p class="skill-text">
            基本的な構文については習得しています。また、Eclipse環境下でスロット等の簡単なゲームの開発経験があります。
          </p>
        </div>
      </div>    
    </div>

    <div class="skill-container">
      <div class="skill-item fade-in">
        <p class="skill-img"><svg viewBox="0 0 128 128" width="70px" height="70px">
          <path fill="#00618A" d="M116.948 97.807c-6.863-.187-12.104.452-16.585 2.341-1.273.537-3.305.552-3.513 2.147.7.733.809 1.829 1.365 2.731 1.07 1.73 2.876 4.052 4.488 5.268 1.762 1.33 3.577 2.751 5.465 3.902 3.358 2.047 7.107 3.217 10.34 5.268 1.906 1.21 3.799 2.733 5.658 4.097.92.675 1.537 1.724 2.732 2.147v-.194c-.628-.8-.79-1.898-1.366-2.733l-2.537-2.537c-2.48-3.292-5.629-6.184-8.976-8.585-2.669-1.916-8.642-4.504-9.755-7.609l-.195-.195c1.892-.214 4.107-.898 5.854-1.367 2.934-.786 5.556-.583 8.585-1.365l4.097-1.171v-.78c-1.531-1.571-2.623-3.651-4.292-5.073-4.37-3.72-9.138-7.437-14.048-10.537-2.724-1.718-6.089-2.835-8.976-4.292-.971-.491-2.677-.746-3.318-1.562-1.517-1.932-2.342-4.382-3.511-6.633-2.449-4.717-4.854-9.868-7.024-14.831-1.48-3.384-2.447-6.72-4.293-9.756-8.86-14.567-18.396-23.358-33.169-32-3.144-1.838-6.929-2.563-10.929-3.513-2.145-.129-4.292-.26-6.438-.391-1.311-.546-2.673-2.149-3.902-2.927C17.811 4.565 5.257-2.16 1.633 6.682c-2.289 5.581 3.421 11.025 5.462 13.854 1.434 1.982 3.269 4.207 4.293 6.438.674 1.467.79 2.938 1.367 4.489 1.417 3.822 2.652 7.98 4.487 11.511.927 1.788 1.949 3.67 3.122 5.268.718.981 1.951 1.413 2.145 2.927-1.204 1.686-1.273 4.304-1.95 6.44-3.05 9.615-1.899 21.567 2.537 28.683 1.36 2.186 4.567 6.871 8.975 5.073 3.856-1.57 2.995-6.438 4.098-10.732.249-.973.096-1.689.585-2.341v.195l3.513 7.024c2.6 4.187 7.212 8.562 11.122 11.514 2.027 1.531 3.623 4.177 6.244 5.073v-.196h-.195c-.508-.791-1.303-1.119-1.951-1.755-1.527-1.497-3.225-3.358-4.487-5.073-3.556-4.827-6.698-10.11-9.561-15.609-1.368-2.627-2.557-5.523-3.709-8.196-.444-1.03-.438-2.589-1.364-3.122-1.263 1.958-3.122 3.542-4.098 5.854-1.561 3.696-1.762 8.204-2.341 12.878-.342.122-.19.038-.391.194-2.718-.655-3.672-3.452-4.683-5.853-2.554-6.07-3.029-15.842-.781-22.829.582-1.809 3.21-7.501 2.146-9.172-.508-1.666-2.184-2.63-3.121-3.903-1.161-1.574-2.319-3.646-3.124-5.464-2.09-4.731-3.066-10.044-5.267-14.828-1.053-2.287-2.832-4.602-4.293-6.634-1.617-2.253-3.429-3.912-4.683-6.635-.446-.968-1.051-2.518-.391-3.513.21-.671.508-.951 1.171-1.17 1.132-.873 4.284.29 5.462.779 3.129 1.3 5.741 2.538 8.392 4.294 1.271.844 2.559 2.475 4.097 2.927h1.756c2.747.631 5.824.195 8.391.975 4.536 1.378 8.601 3.523 12.292 5.854 11.246 7.102 20.442 17.21 26.732 29.269 1.012 1.942 1.45 3.794 2.341 5.854 1.798 4.153 4.063 8.426 5.852 12.488 1.786 4.052 3.526 8.141 6.05 11.513 1.327 1.772 6.451 2.723 8.781 3.708 1.632.689 4.307 1.409 5.854 2.34 2.953 1.782 5.815 3.903 8.586 5.855 1.383.975 5.64 3.116 5.852 4.879zM29.729 23.466c-1.431-.027-2.443.156-3.513.389v.195h.195c.683 1.402 1.888 2.306 2.731 3.513.65 1.367 1.301 2.732 1.952 4.097l.194-.193c1.209-.853 1.762-2.214 1.755-4.294-.484-.509-.555-1.147-.975-1.755-.556-.811-1.635-1.272-2.339-1.952z"></path>
          </svg>
        </p>
        <div class="skill-body">
          <h3 class="skill-name">MySQL</h3>
          <p class="skill-text">
            テーブルの作成からデータの検索や挿入、更新、削除等基本的な構文については習得しています。
          </p>
        </div> 
      </div>
      <div class="skill-item fade-in">
        <p class="skill-img"><svg fill="none" width="70px" height="70px"  xmlns="http://www.w3.org/2000/svg" viewBox="0.155 0 37.299 38"><g fill="#0085ca"><path d="M37.454 36.845V1.155C37.454.578 37 0 36.317 0H1.292C.61 0 .155.462.155 1.155v35.69C.155 37.423.61 38 1.292 38h35.025c.682 0 1.137-.578 1.137-1.155zm-1.478-.346H1.634V1.502h34.342z"/><path d="M14.37 30.84c5.117 0 8.415-2.889 8.415-10.396V7.739h-3.753V20.79c0 4.967-1.933 6.584-4.662 6.584s-4.435-1.617-4.435-6.584V7.854h-3.98V20.56c0 7.392 3.298 10.28 8.415 10.28zM29.835 10.857c1.365 0 2.388-.924 2.388-2.194 0-1.386-1.023-2.31-2.388-2.31s-2.388.924-2.388 2.31c0 1.27 1.024 2.194 2.388 2.194zM31.768 13.86h-3.866v16.98h3.866z"/></g></svg></p>
        <div class="skill-body">
          <h3 class="skill-name">UiPath</h3>
          <p class="skill-text">
            大手クライアント様にて、1年ほどの実務経験があります。主にWebページのスクレイピングからExcelへの転記、Excel形式の書類作成から送信までの一連の処理、社内システムへの情報入力等、単純な事務作業の自動化が可能です。
          </p>
        </div>
      </div>
    </div>
  </div>
  <!-- /skill -->

  <!-- ABOUT -->
  <div class="about wrapper" id="about">
    <h2 class="title fade-in">ABOUT</h2>
    <div class="profile">
      <div class="image fade-in">
        <img class="profile-img" src="img/profile.jpg" alt=""> 
      </div>
      <div class="profile-info">
        <div class="info1 fade-in">
          <h3 class="profile-title">＜ プロフィール ＞</h3>
          <p class="career-text">名前：奥田 拓也</p>
          <p class="career-text">年齢：26歳</p>
          <p class="career-text">出身：島根県</p>
          <p class="career-text">居住地：島根県 ⇒ 岡山県（大学4年間）⇒ 東京都 神楽坂（現在）</p>
          <p class="career-text">趣味：スキー（インターハイ出場経験あり）、ギター、テレビゲーム、神楽坂周辺でカフェ巡り</p>
        </div>
        <div class="info2 fade-in">
          <h3 class="profile-title">＜ 自己PR ＞</h3>
          <p class="career-text">
            私の強みは継続力です。<br>
            学生時代には、未経験の状態から必死に練習を続けたことでインターハイ出場の夢を叶えたり、最近では独学を継続してプログラミングやWeb制作スキルを習得したりと、過去に自分の強みを生かして物事を成し遂げた経験があります。現在もこの強みを生かしてスキルを磨き続けており、お客様のニーズに沿ったシステム構築の実現に向けて、日々精進しています。
          </p>
        </div>
      </div>
    </div>
  </div>
  <!-- /ABOUT -->
  
  <!-- CONTACT -->
  <div class="contact wrapper" id="contact">
    <h2 class="title fade-in">CONTACT</h2>
    <p class="fade-in">お問い合わせはフォームからお願い致します。</p>
    <p class="contact-check fade-in">すべて入力必須項目です。</p>
    <form action="#contact" method="POST" class="contactForm fade-in">
      <table>
        <tbody>
          <tr>
            <th>お名前</th>
            <td>
              <input type="text" name="name" maxlength="40" value="<?php if(isset($_POST['name'])) {echo h($_POST['name']);} ?>">
              <?php if(isset($error['name']) && $error['name'] == 'blank'): ?>
                <p class="error">* この項目は必須項目です。</p>
              <?php endif; ?>
            </td>
          </tr>
          <tr>
            <th>メールアドレス</th>
            <td>
              <input type="email" name="email" maxlength="100" value="<?php if(isset($_POST['email'])) {echo h($_POST['email']);} ?>">
              <?php if(isset($error['email']) && $error['email'] == 'blank'): ?>
                <p class="error">* この項目は必須項目です。</p>
              <?php endif; ?>
            </td>
          </tr>
          <tr>
            <th>お問い合わせ内容</th>
            <td>
              <textarea rows="6" cols="60" name="message"><?php if(isset($_POST['email'])) {echo h($_POST['message']);} ?></textarea>
              <?php if(isset($error['message']) && $error['message'] == 'blank'): ?>
                <p class="error">* この項目は必須項目です。</p>
              <?php endif; ?>
            </td>
          </tr>
        </tbody>
      </table>
      <input type="submit" name="check" id="button" value="確認画面へ">
    </form>
  </div>
  <!-- /CONTACT -->
  
  <!-- FOOTER -->
  <footer class="footer">
    <div class="copyright">&copy;2021 TAKUYA OKUDA. All Rights Reserved.</div>
  </footer>
  <!-- /FOOTER -->

  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>    
  <script src="js/script.js"></script>
  <!-- /jQuery -->
</body>
</html>