    <footer class="footer">
        <h4 class="footer__header">Construisont ensemble !</h4>
        <figure class="footer__citation">
            <blockquote cite="">
                <p>
                    “Great things in business are never done by one person. They’re done by a team of people.”
                </p>
            </blockquote>
            <figcaption>
                Steve Jobs
                <cite> Steve Jobs: His Own Words and Wisdom</cite>
            </figcaption>
        </figure>
        <div class="footer__contact">
            <h4>Jean-Baptiste Stephan</h4>
            <div class="footer__contact-position" id="mailto">
                <p>Fullstack developer <span>stephan.jeanba(at).gmail.com</span></p>
            </div>
            <a name="intro__btn-footer" id="intro__btn-footer" href="<?php URL ?>public/Assets/PDF/CV_JeanBaptiste_Stephan.pdf" role="button" class="btn--custom btn-primary--custom">Resume</a>
        </div>
        <div class="footer__menu">
            <h4>À découvrir</h4>
            <nav>
                <ul>
                    <li><a href="<?php URL ?>articles">Blog</a></li>
                    <?php if (empty($_SESSION["profile"])) : ?>
                        <li><a href="<?= URL ?>login">Connexion</a></li>
                        <li><a href="<?= URL ?>register">Créer un compte</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
        <div class="footer__follow">
            <h4>Suivez moi !</h4>
            <nav>
                <ul>
                    <li><a href="https://www.linkedin.com/in/jean-baptiste-stephan/">Linkedin</a></li>
                    <li><a href="#">Instagram</a></li>
                    <li><a href="#">Youtube</a></li>
                    <li><a href="#">Twitch</a></li>
                </ul>
            </nav>
        </div>
        <p class="footer__cgu">Developed & code with <span>❤️</span> by Me</p>
    </footer>