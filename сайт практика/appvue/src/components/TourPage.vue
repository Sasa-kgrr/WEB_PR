
<template>
    <div class="section product" id="product">
        <div class="body_element">
            <p class="p_header">
                Ближайщие туры
            </p>
            <div class="tour tour_1">
                <div class="image_container"></div>
                <p class="caption">Большое Голоустное</p>
            </div>
            <div class="tour tour_2">
                <div class="image_container"></div>
                <p class="caption">Листвянка</p>
            </div>
            <div class="tour tour_3">
                <div class="image_container"></div>
                <p class="caption">Ольхон</p>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</template>


<script>

</script>


<style scoped>
 /* Обновленные стили CSS */
.tour {
  display: inline-block; /* Блоки будут расположены в ряд */
  width: 30%; /* Уменьшаем ширину, чтобы уместить три блока в ряд */
  height:400px;
  margin: 1.5%; /* Добавляем небольшой отступ между блоками */
  border-radius: 15px; /* Закругляем углы */
  overflow: hidden; /* Обрезаем содержимое по краям блока */
  background-color: #b3e5fc; /* Светло-голубой фон */
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Добавляем тень для блока */
  vertical-align: top; /* Выравниваем блоки по верхнему краю */
}

.image_container {
  width: 100%;
  height: 80%; /* Задаем высоту для изображения */
  background-position: center center;
  background-repeat: no-repeat;
  background-size: cover; /* Изображение будет покрывать весь контейнер */
}

.caption {
  font-size: 28px;
  color: #333;
  text-align: center;
  padding: 0px 10px; 
  padding-bottom: 10px;/* Увеличиваем отступы для подписи */
  background-color: #b3e5fc; /* Светло-голубой фон для подписи */
  transition: transform 0.3s ease; /* Плавность эффекта нажатия */
}

.caption:hover {
  transform: translateY(-5px); /* Эффект нажатия */
}

/* Применяем стили к каждому туру */
.tour_1 .image_container { background-image: url('img/goloyst.jpg'); }
.tour_2 .image_container { background-image: url('img/Listv.jpg'); }
.tour_3 .image_container { background-image: url('img/olchon.jpg'); }

</style>
