<template>
<div>
    <div class="section menu">
        <div class="body_element">
            <ul class="list_menu">
                <li><a href="#main">Главная</a></li>
                <li><a href="#about">О компании</a></li>    
                <li><a href="#product">Ближайщие туры</a></li>    
                <li><a href="#photos">Фотогалерея</a></li>    
                <li><a href="#video">Видео</a></li>    
                <li><a href="#form">Контакты</a></li>
            </ul>
        </div>
    </div>
    <div class="section main" id="main">
        <div class="body_element">
            <div class="tizer">
                <p  class="waves" data-word="Байкал">
                    Байкал
                </p>
                <p class="title_t">
                    Авторские туры по незабываемым <br>
                    уголкам озера Байкал
                </p>
            </div>
        </div>
    </div>
</div>
    
</template>
<script>
    export default {
 
  }

</script>

<style scoped>
    .section.menu{
      padding-top: 20px;
      padding-bottom: 20px;
      
  }

  .menu{
      text-align: center;
      z-index: 999;
      position: fixed;
      top: 0;
      width: 100%;
      background-color: azure;
      transform: none;
      filter: none;
      perspective: none;
      
  }
  .menu .list_menu li{
      display: inline-block;
      margin: 10px;
  }

  .menu .list_menu li a{
      color: black;
      font-size: 20px;
      text-decoration: none;
      padding-left: 15px;
      text-shadow: 0 0 7px #538caf;
      transition: all 500ms;
  }

  .menu .list_menu li a:hover {
    font-size: 24px;
    text-shadow: 0 0 80px #538caf,
                 0 0 120px #538caf,
                 0 0 200px #538caf;
  }

  .main{
      height: 700px;
      background-image: url(img/main_b.jpg);
      background-position: center center;
      background-repeat: no-repeat;
      margin-top: 113px;
  }

 .waves {
    margin-bottom: 5px;
    font-size: 150px;
    color: rgb(161, 220, 244);
    font-style: italic;
    font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    color: transparent;
    -webkit-text-stroke: 3px #ffffff;
    position: relative;
  }

.waves:after{
    content: attr(data-word);
    position: absolute;
    top: 0;
    left: 0;
    color: #9bdcf7;
    animation: waves 3s ease-in-out infinite forwards;
  }

@keyframes waves{
    0%, 100% {
        clip-path: polygon(0 66%, 11% 59%, 18% 51%, 26% 46%, 35% 41%, 48% 44%, 55% 54%, 63% 63%, 76% 60%, 82% 50%, 92% 48%, 100% 53%, 100% 100%, 0% 100%);
    }
    50% {
        clip-path: polygon(0 66%, 8% 74%, 17% 77%, 28% 70%, 35% 57%, 48% 44%, 56% 39%, 69% 41%, 75% 47%, 84% 60%, 92% 61%, 100% 53%, 100% 100%, 0% 100%);
    }
  }

  .main .tizer .title_t{
      margin:0;
      margin-left: 5px;
      font-size: 24px;
      color: rgb(255, 255, 255);
      font-family:Arial, Helvetica, sans-serif;
      text-shadow: 0 0 10px #123f5b;
  }


</style>
