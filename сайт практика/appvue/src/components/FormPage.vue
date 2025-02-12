<template>
    <div class="section form" id="form">
        <div class="body_element">
            <p class="p_header">
                Контакты
            </p>
            <div class="map">
                <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A9d72a1d4dc6c3911f0998eb8810d74f770fd8d7e4df62589a23749c34581f19d&amp;source=constructor" width="100%" height="300" frameborder="0"></iframe>
            </div>
            <div class="contact_form">
                <form>                      
                    <input type="text" v-model="name" class="input-phone" placeholder="Имя" name="input_name"><br/>                
                    <input type="text" class="input-phone" placeholder="Телефон" name="input_phone"><br/>
                    <input type="text" class="input-phone" placeholder="Тур" name="input_tour"><br/>
                    <button v-show=" name != '' ">Отправить</button>
                </form>
                
            </div>
            <div class="clear"></div>
        </div>
        <footer>
            <div class="footer_cols">
                    <div class="addres">г. Санкт-Петербург</div>
                    <div class="contacts">8910678395</div>
                    <div class="social_link">
                        <a href="https://vk.com/ares_02">VK</a>
                    </div>
                    <div class="clear"></div>
                </div>
        </footer>
    </div>
</template>
<script>
export default {
    data () {
    return {
      name: ""
    }
  }
}
</script>
<style scoped>
    .form {
      background-color: rgb(15, 46, 77);
  }

  .form .map, .form .contact_form{
      float: left;
      width: 50%;
      padding: 10px;
  }
  
  .form .contact_form{
      color: aliceblue;
      padding-left: 30px;
      font-size: 30px;
  }

  .form .contact_form label{
      padding-top: 20px;
      margin-top: 5px;
      display: block;
      
  }

  .form .contact_form input{
      width: 250px;
      height: 40px;
      margin-top: 20px;
      padding-left: 10px;
      border-radius: 15px;
      border: 2px solid transparent; 
      transition: border-color 0.3s, box-shadow 0.3s;
  }
  .form .contact_form input:hover {
    border-color: #00BFFF; 
    box-shadow: 0 0 8px 3px #00BFFF;
}

  .form .contact_form button{
      background-color: rgb(137, 195, 246);
      border: 3px solid #12093c;
      border-radius: 15px;
      padding: 15px;
      width: 190px;
      font-size: 20px;
      margin-top: 20px;
      margin-left: 35px;
      transition: transform 0.1s, background-color 0.1s; 
}

.form .contact_form button:active {
  transform: scale(0.95); 
  background-color: rgb(117, 175, 226);
}

  .footer_cols {
  display: flex;
  justify-content: center;
  padding-bottom: 10px;
  margin-top: 40px;
  border-bottom: 1px solid #fff;
  margin-bottom: 20px;
  margin-left: auto; 
  margin-right: auto;
}

.footer_cols .addres,
.footer_cols .contacts,
.footer_cols .social_link {
  padding: 35px;
  padding-left: 30px;
  color: aliceblue;
  text-align: center;
  box-sizing: border-box;
}

  .footer_cols .social_link a {
    text-decoration: none;
    color: aliceblue;
  }

</style>