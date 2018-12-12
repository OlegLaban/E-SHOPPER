<footer id="footer"><!--Footer-->
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <p class="pull-left">Copyright © 2015</p>
                        <p class="pull-right">Курс PHP Start</p>
                    </div>
                </div>
            </div>
        </footer><!--/Footer-->


        <script src="/template/js/jquery.js"></script>
        <script src="/template/js/bootstrap.min.js"></script>
        <script src="/template/js/jquery.scrollUp.min.js"></script>
        <script src="/template/js/price-range.js"></script>
        <script src="/template/js/jquery.prettyPhoto.js"></script>
        <script src="/template/js/main.js"></script>
       
        
        <script>
            $(document).ready(function(){
                $(".add-to-cart").click(function(){
                    var id = $(this).attr("data-id");
                        $.ajax({
                           url:"/cart/addAjax/" + id,
                           type:"POST",
                           data:{},
                           dataType:"html",
                           success:function sucFunc(data){
                                     $("#cart-count").html(data);
                                    }        
                        });
                        return false;
                });
                
               
                
                function heightChange(){
                   var heigthAllElements = $("section")[0].clientHeight + $('header')[0].clientHeight + $('footer')[0].clientHeight,
                    heigthDocument = document.documentElement.clientHeight;
                   if(heigthAllElements < heigthDocument){
                       var marginTopFooter = heigthDocument - heigthAllElements;
                       $('footer')[0].style = "margin-top: " + marginTopFooter + "px;";
                   } 
                }
                document.onresize = heightChange();
                heightChange();
            });
           
           
        </script>
    </body>
</html>