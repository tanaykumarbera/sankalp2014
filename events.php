<?php
    $title= "Events";
    require_once './header.php';
?>
        <div id="shutter"><div id="sicn"></div></div>
        <section id="container" itemscope itemtype="http://schema.org/Event">
            <meta itemprop="name" content="Sankalp"/>
            <link itemprop="url" href="www.snklp.com"/>
            <meta itemprop="startDate" content="2014-03-02T10:00">
            <meta itemprop="endDate" content="2014-03-03:00.000">
            <meta itemprop="description" content="annual technical fest of NITMAS">
        </section>
        
        
<?php require_once './scripts.php';?>        
        <script type="text/javascript">
            $(document).ready(function(){
               comm();
               loadEve();
            });
            $(document).keyup(function(e){
                switch(e.keyCode) {
                    case 37: (p!=1) ? browse(p-1) : browse(p); break;
                    case 39: (p!=12) ? browse(p+1) : browse(p); break;
                    default: return;
                }
                $(".page").focus();
                e.preventDefault(); 
            });
        </script>
<?php require_once './footer.php';?>