<template>
    <div class="section photos" id="photos">
        <div class="body_element">
            <p class="p_header">
                Фотогалерея
            </p>
            <div class="gallery" v-for="(img, index) in images" :key="index">
                <img :src="require('@/img/' + img)" :id="index" height="410" width="320" 
                class="image" 
                @click="openSlider"  
                @mouseover="hover = true"
                @mouseleave="hover = false"/>
            </div>
            <div class="clear"></div>
            <div class="sliderBox" v-if="isSliderOpen">
                <div class="slider">
                    <img :src="require('@/img/' + currentImgSrc)">
                </div>
                <button class="slider-button prev" @click="showPrevSlide">‹</button>
                <button class="slider-button next" @click="showNextSlide">›</button>
                <button class="close-button" @click="exitSlider">✕</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
  data() {
    return {
      images: ['g1.jpg', 'g2.jpg', 'g3.jpg', 'g4.jpg', 'g5.jpg', 'g6.jpg'],
      slideIndex: 0,
      isSliderOpen: false
    };
  },
  computed: {
    currentImgSrc() {
      return this.images[this.slideIndex];
    }
  },
  methods: {
    openSlider(event) {
      this.slideIndex = parseInt(event.target.id);
      this.isSliderOpen = true;
    },
    showPrevSlide() {
      this.slideIndex = (this.slideIndex + this.images.length - 1) % this.images.length;
    },
    showNextSlide() {
      this.slideIndex = (this.slideIndex + 1) % this.images.length;
    },
    exitSlider() {
      this.isSliderOpen = false;
    }
  }
};
</script>


<style scoped>
    .gallery{
      float:left;
      width: 33.33333%;
      display: flex;
      align-items: center;
      justify-content: center;
      padding-bottom: 10px;
      
  }

  .sliderBox {
  position: fixed; 
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  width: 100%; 
  height: 100%; 
  background-color: rgba(0, 0, 0, 0.8); 
  z-index: 1001; 
  display: flex; 
  justify-content: center; 
  align-items:center;
  
}

.slider {
  max-width: 80%; 
  max-height: 80%; 
  overflow: hidden; 
  z-index: 1000;
  position: relative;
}

.slider img {
  width: 420px; 
  height: 570px; 
  object-fit: cover; 
}

.slider-button {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  background-color: #fff;
  border: none;
  cursor: pointer;
  padding: 10px;
  border-radius: 5px;
  z-index: 1001;
}

.slider-button.prev {
  left: 10px;
}

.slider-button.next {
  right: 10px;
}

.close-button {
  position: absolute;
  top: 280px;
  right: 10px;
  background-color: #ff4545;
  color: #fff;
  border: none;
  cursor: pointer;
  padding: 5px 10px;
  border-radius: 5px;
  z-index: 1001;
}

.slider-button:hover,
.close-button:hover {
  opacity: 0.8;
}

</style>