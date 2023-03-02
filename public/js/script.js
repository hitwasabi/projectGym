const itemslidebar = document.querySelectorAll(".category-left-li")
itemslidebar.forEach(function(menu,index){
	menu.addEventListener("click",function(){
		menu.classList.toggle("block")
	})
})

//----------------------PRODUCT---------------\
const bigImg = document.querySelector(".product-content-left-big-img img")
const smallImg = document.querySelectorAll(".product-content-left-small-img img")
smallImg.forEach(function(imgItem,X){
	imgItem.addEventListener("click",function(){
		bigImg.src = imgItem.src
	})
})


const chitiet = document.querySelector(".chitiet")
const chitiethon = document.querySelector(".chitiethon")
if(chitiet){
	chitiet.addEventListener("click",function(){
		document.querySelector(".product-content-right-bottom-content-chitiethon").style.display = "none"
		document.querySelector(".product-content-right-bottom-content-chitiet").style.display = "block"
	})
}

if(chitiethon){
	chitiethon.addEventListener("click",function(){
		document.querySelector(".product-content-right-bottom-content-chitiethon").style.display = "block"
		document.querySelector(".product-content-right-bottom-content-chitiet").style.display = "none"
	})
}

const butTon = document.querySelector(".product-content-right-bottom-top")
if(butTon){
	butTon.addEventListener("click",function(){
		document.querySelector(".product-content-right-bottom-content-big").classList.toggle("activeB")
	})
}
