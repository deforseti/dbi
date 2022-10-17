<style type="text/css">
	@font-face {
    font-family:klavika; /* Имя шрифта */
    src: url(/view/fonts//DIN_Medium.ttf); /* Путь к файлу со шрифтом */
   }

@font-face {
    font-family:'bookOldStyle'; /* Имя шрифта */
    src: url(/view/fonts//BKMNOS.ttf); /* Путь к файлу со шрифтом */
   }

@font-face {
    font-family:centurygothic; /* Имя шрифта */
    src: url(/view/fonts//CenturyGothic.ttf); /* Путь к файлу со шрифтом */
}
@font-face {
  font-family: 'Material Icons';
  font-style: normal;
  font-weight: 400;
  src: url(/view/fonts/flUhRq6tzZclQEJ-Vdg-IuiaDsNc.woff2) format('woff2');
}

.material-icons {
  font-family: 'Material Icons';
  font-weight: normal;
  font-style: normal;
  font-size: 24px;
  line-height: 1;
  letter-spacing: normal;
  text-transform: none;
  display: inline-block;
  white-space: nowrap;
  word-wrap: normal;
  direction: ltr;
  -webkit-font-feature-settings: 'liga';
  -webkit-font-smoothing: antialiased;
}

*{
	margin: 0;
	padding: 0;
	-moz-box-sizing: border-box; /* Для Firefox */
    -webkit-box-sizing: border-box; /* Для Safari и Chrome */
    box-sizing: border-box; /* Для IE и Opera */
    -o-box-sizing: border-box;
}
.text-justify{
	text-align: justify;
}
.text-center{
	text-align: center;
}
ul{
	list-style: none;
}
a{
	text-decoration: none;
}
h2{
	font-size: 20px;
	font-size: 1.25rem;
}

body{
	background: url(/uploads/images/city.jpg) no-repeat fixed center;
	background-size: calc(100% + 50px);
	-webkit-user-select: none; /* Safari */        
	-moz-user-select: none; /* Firefox */
	-ms-user-select: none; /* IE10+/Edge */
	user-select: none; /* Standard */
    font-size: 16px;
}
body *{
	transition: 0.3s;
}
html{
	font-size:16px !important;
}
.textUpercase{
	text-shadow: red 0 0 1px;
}
.header_menu{
	font-family:centurygothic;
	background: rgba(255,255,255,0.9);
	margin-bottom:20px;
	position: relative;
}
.icon_more_sub_menu img{
	width: 15px;
    margin-left: 5px;
}
.icon_more_sub_menu img:last-child{
	display: none;
}
.head_menu_top{
	margin: 0 auto;
	padding: 0;
	text-align: center;
	float: left;
	margin-left: 20px;
}
.head_menu_top li{
	display: inline-block;
	text-transform: uppercase;
	margin: 0 auto;
	line-height: 55px;
}

/*hamburger menu*/
#nav-icon1, #nav-icon2, #nav-icon3, #nav-icon4 {
  width: 60px;
  height: 45px;
  position: relative;
  /*margin: 50px auto;*/
  -webkit-transform: rotate(0deg);
  -moz-transform: rotate(0deg);
  -o-transform: rotate(0deg);
  transform: rotate(0deg);
  -webkit-transition: .5s ease-in-out;
  -moz-transition: .5s ease-in-out;
  -o-transition: .5s ease-in-out;
  transition: .5s ease-in-out;
  cursor: pointer;
  display: none;
}

#nav-icon1 span, #nav-icon3 span, #nav-icon4 span {
  display: block;
  position: absolute;
  height: 9px;
  width: 100%;
  background: #d3531a;
  border-radius: 9px;
  opacity: 1;
  left: 0;
  -webkit-transform: rotate(0deg);
  -moz-transform: rotate(0deg);
  -o-transform: rotate(0deg);
  transform: rotate(0deg);
  -webkit-transition: .25s ease-in-out;
  -moz-transition: .25s ease-in-out;
  -o-transition: .25s ease-in-out;
  transition: .25s ease-in-out;
}

#nav-icon1 span:nth-child(1) {
  top: 0px;
}

#nav-icon1 span:nth-child(2) {
  top: 18px;
}

#nav-icon1 span:nth-child(3) {
  top: 36px;
}
#nav-icon1.open span:nth-child(1) {
  top: 18px;
  -webkit-transform: rotate(135deg);
  -moz-transform: rotate(135deg);
  -o-transform: rotate(135deg);
  transform: rotate(135deg);
}

#nav-icon1.open span:nth-child(2) {
  opacity: 0;
  left: -60px;
}
#nav-icon1.open span:nth-child(3) {
  top: 18px;
  -webkit-transform: rotate(-135deg);
  -moz-transform: rotate(-135deg);
  -o-transform: rotate(-135deg);
  transform: rotate(-135deg);
}
.head_menu_top li a{
	display: block;
	padding: 0px 40px 0px 10px;
	height: 30px;
	color: #2a0077;
}
.head_menu_top li a: first-child{
	padding: 0px 10px 0px 10px;
}
.logo_dbi img{
	width: 100%;
	height: auto;
	min-width: 300px;
}
.header{
	padding:10px 0px;
	text-align: center;
	width: 100%;
	z-index: 10;
	margin-bottom: 10px;
	box-shadow: 0 0 10px rgba(0,0,0,0.5);
	background: #fff;
}
.wrapp-head-content{
	display: flex;
	justify-content: space-around;
}
.block_contact{
	/*width: 160px;*/
	margin:0;
}
.mein_menu{
	
}
.main-top-menu{
	position: relative;
	display: flex;
    width: 100%;
    justify-content: space-between;
    /*height: 100%;*/
    align-items: center;
    padding:3px 0px 15px 0;
    /*padding-right: 15px;*/
}
.main-top-menu .close-main-menu-mobile{
	position: absolute;
	display: none;
	left: 10px;
	top: 10px;
	font-size: 25px;
	z-index: 9;
}
.wrap-menu-a-search{
	width: 93%;
}
.lang-swicher{
	width: 7%;
	padding:0 10px;
}
.lang-swicher a{
	display: block;
	margin-bottom: 5px;
	border:1px solid #c1c1c1;
}
.lang-swicher a:last-child{
	margin-bottom: 0;
}
.main-top-menu li a{
	color:#000;
	font-weight: 100;
	font-size: 0.875rem;
}
.main-top-menu>li>a{
	font-weight: 700;
	font-size: 1rem;
}
.main-top-menu>li>a{
	transition: 0.3s;
    text-transform: uppercase;
    position: relative;
}

.main-top-menu>li{
	height: 100%;
    display: flex;
    align-items: center;
}
.main-top-menu li{
	position: relative;
}
.main-top-menu li:hover >ul{
	display: block;

}
.main-top-menu>li ul li{
	padding: 0 !important;
}
.main-top-menu>li ul li a{
	border-bottom: 1px solid #fff;
	text-decoration: none !important;
	display: block;
	padding:3px 10px;
}
.main-top-menu>li ul li a:hover{
	border-bottom: 1px solid red;
}

.main-top-menu>li ul{
	display: none;
	position: absolute;
    z-index: 999999;
    background: rgba(255,255,255,0.9);
    left: 0;
    top:100%;
    box-shadow: 0px 5px 20px rgba(0,0,0,0.3);
}
.main-top-menu li ul li{
	float: none;
    position: static;
    text-align: left;
    padding: 5px 10px;
    white-space: nowrap;
}
.search-form{
	width: 100%;
	text-align: left;
	position: relative;
	overflow:hidden;
}
.search-form input[type="search"]{
	padding:3px  0 3px 20px;
	width: calc(100% - 25px);
	font-size: 0.875rem;
}
.search-icon{
	position: absolute;
	top: 3px;
	left: 0;
}
.breadcrumbs{
	background: rgba(255,255,255,0.7);
	padding-top:10px;
	padding-bottom:10px;
}
.breadcrumbs span,.breadcrumbs span a{
	color:#0e130e;
	font-size: 0.875rem;
	/*text-transform:capitalize;*/
}
.breadcrumbs span{
	margin-right: 10px;

}
</style>