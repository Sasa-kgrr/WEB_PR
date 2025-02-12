<template>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <title>Туры на Байкал</title>
  </head>
  <MainPage/>
  <InfoPage class="scroll-animate"/>
  <TourPage class="scroll-animate"/>
  <GalleryPage class="scroll-animate"/> 
  <VideoPage class="scroll-animate"/>
  <FormPage class="scroll-animate"/>
  </html>
    
</template>

<script>
import MainPage from './components/MainPage.vue'
import InfoPage from './components/InfoPage.vue'
import TourPage from './components/TourPage.vue'
import GalleryPage from './components/GalleryPage.vue'
import VideoPage from './components/VideoPage.vue'
import FormPage from './components/FormPage.vue'



export default {
  components: { MainPage, InfoPage, TourPage, GalleryPage, VideoPage, FormPage },
  mounted() {
    this.observer = new IntersectionObserver(
      (entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('visible');
          } else {
            entry.target.classList.remove('visible');
          }
        });
      },
      {
        threshold: 0.1
      }
    );
    const animatedElements = this.$el.querySelectorAll('.scroll-animate');
    animatedElements.forEach(el => this.observer.observe(el));
  },
  beforeUnmount() {
    if (this.observer) {
      this.observer.disconnect();
    }
  }
};
</script>

<style>
  .scroll-animate {
  opacity: 0;
  transform: translateY(100px);
  transition: opacity 0.5s, transform 0.5s;
}
.visible {
  opacity: 1;
  transform: translateY(0);
}
  
  .clear{
      clear: both;
  }

  div{
      box-sizing: border-box;
  }

  .section{
      padding-top: 100px;
      padding-bottom: 100px;
  }

  .section .body_element{
      width: 1140px;
      margin: 0 auto;
  }

  .p_header{
      font-size: 54px;
      color:aliceblue;
      text-align: center;
      padding:20px;
      margin:0;
      margin-bottom: 50px;
  }

  .image {
  transition: transform 0.5s ease;
}

.image:hover {
  transform: scale(1.1);
}


</style>
