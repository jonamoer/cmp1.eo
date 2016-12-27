<footer class="page-footer light-blue darken-1">
    <div class="footer-copyright">
        <div class="container">
            © 2014 Copyright Text

            <a class="grey-text text-lighten-4 right" href="login.php">
                <?php if(isset($_SESSION['username'])){
                echo "Hey ".$_SESSION['username'] . " how are u?";
                }
                else{
                    echo "Hey how are you? Why don't you login?";
                }





                    ?></a>
        </div>
    </div>
</footer>

<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>

