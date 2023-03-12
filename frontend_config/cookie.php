<?php
 $script_name = $_SERVER["SCRIPT_NAME"];
 $break = explode('/', $script_name);
 $pfile = $break[count($break) - 1];
 if($pfile == 'index.php'){
   $cookie_docs_lnk = 'frontend_config/docs/cookie_policy.pdf';
 }else{
   $cookie_docs_lnk = 'docs/cookie_policy.pdf';
 }
?>
<style>
    .cookie-bar {
        padding: 20px;
    display: grid;
    grid-template-columns: 6fr 2fr;
    background-color: white;
    overflow: hidden;
    position: fixed;
    bottom: 0;
    width: 100%;
    }
</style>

<div class="cookie-bar">
    <div>
        We use cookies on our website to give you the most relevant experience by remembering your preferences and repeat visits. By clicking "Accept All", you consent to the use of ALL the cookies. However, you can visit the "Cookie Settings" to give controlled consent.
    </div>
    <div>
        <a class="btn btn-primary" href="">Accept</a>
        <a class="btn btn-sw" href="<?php echo $cookie_docs_lnk; ?>">Read All</a>
    </div>
</div>

