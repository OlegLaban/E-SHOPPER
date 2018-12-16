function slider(maxWidth, maxHeight, countItems, countMoveElements, difference, moveInterval){            
                var imageArr = document.getElementsByClassName('image-slider'), allWidth,
                    allWidth = 0,
                    widthOneElement,
                    divImage = document.getElementsByClassName('product-car'),
                    nowDiv = document.getElementById('now'),
                    mainSlider = document.getElementById("slider"),
                    sliderWrap = document.querySelector("#slider-wrap"),
                    sliderOldWrap = document.querySelector("#slider-old-wrap"),
                    ToRigth = document.querySelector("#to-rigth"),
                    ToLeft = document.querySelector("#to-left");
            
                for(var i = 0; i < imageArr.length; i++ ){
                    if(imageArr[i].width > maxWidth){
                        correctHeight =  imageArr[i].clientHeight * (maxWidth / imageArr[i].clientWidth);
                        imageArr[i].style = "width:" + maxWidth + "px;" + "height:" + correctHeight + "px;";
                    }else if(imageArr[i].width < maxWidth){
                        correctHeight =  imageArr[i].clientHeight * (imageArr[i].clientWidth / maxWidth);
                        imageArr[i].style = "width:" + maxWidth + "px;" + "height:" + correctHeight + "px;";
                    }   
                }
                for(var j = 0; j < imageArr.length; j++){                  
                     if(imageArr[j].height > maxHeight){         
                       correctWidth =  imageArr[j].width * (maxHeight / imageArr[j].clientHeight);
                       imageArr[j].style = "width:" + correctWidth + "px;" + "height:" + maxHeight + "px;";
                    }              
                }
                
                for(var i = 0; i < divImage.length; i++){
                    marginLeftDivImage = parseInt(getComputedStyle(divImage[i], true).marginLeft);
                    marginRightDivImage = parseInt(getComputedStyle(divImage[i], true).marginRight);
                    allWidth = (divImage[i].offsetWidth + marginLeftDivImage + marginRightDivImage) * divImage.length;
                }
            widthOneElement = allWidth / divImage.length;
            sliderWrap.style = "width:" + allWidth + "px;";
            nowDiv.style = "width:" + (widthOneElement * countItems) + "px;";
            mainSlider.style = "width:" + (widthOneElement * countItems + difference) +  "px;";
            ToRigth.onclick = sliderRigth;
            ToLeft.onclick = sliderLeft;
             
           var movePixel = 0,  lim = allWidth - widthOneElement * countItems;
           
            function sliderRigth(){
               
                movePixel = movePixel - (widthOneElement * countMoveElements);

                if(movePixel < -lim){
                    movePixel = 0;
                }
                sliderOldWrap.style = "margin-left:" + movePixel + "px;";
            }
            function sliderLeft(){
                movePixel = movePixel + ((imageArr[0].width + 22) * countMoveElements);

                if(movePixel > 0){
                    movePixel = -lim;
                }
                sliderOldWrap.style = "margin-left:" + movePixel + "px;";
            }

            setInterval(sliderRigth, moveInterval*1000);
         }
if(document.getElementById("slider") != null){
   slider(200, 199, 3, 1, 150, 3); 
}


/*
 * Первый параметр это максимальная ширина картинки.
 * Второй параметр это максимальная высота картинки.
 * Третий параметр это кол-во отображаемых картинок в области слайдера.
 * Четвертый параметр это колличество картинок перемещаемых за раз.
 * Пятый параметр это разница между основным блоком слайдера и первым дочерним (влияет на положение стрелок).
 * Шестой параметр это интревал работы слайдера в секундах.
 */


