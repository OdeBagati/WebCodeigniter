<!-- Footer -->
    
    <footer class="container pt-4 my-md-5 pt-md-5 border-top mb-0 mt-3">
        <div class="row">
            <div class="col-12 col-md">
                <a href="<?= base_url(); ?>">
                    <img src="<?= base_url(); ?>/assets/img/bali-indah.png" style="width: 100px; height: 100px;" />
                </a>
                <small class="d-block mb-3 mt-3 text-muted">© 2021-<script>document.write(new Date().getFullYear());</script></small>
            </div>
            <div class="col-6 col-md">
                <h5>Watersport Package</h5>
                <ul class="list-unstyled text-small">
                    <li>
                        <a class="text-muted" href="<?= route_to('watersport-single-activity'); ?>">Single Activity</a>
                    </li>
                    <li>
                        <a class="text-muted" href="<?= route_to('watersport-packages'); ?>">Watersport Packages</a>
                    </li>
                    <li>
                        <a class="text-muted" href="<?= route_to('watersport-seawalker-packages'); ?>">Seawalker</a>
                    </li>
                </ul>
            </div>
            <div class="col-6 col-md">
                <h5>Adventure</h5>
                <ul class="list-unstyled text-small">
                    <li>
                        <a class="text-muted" href="#">Rafting</a>
                    </li>
                    <li>
                        <a class="text-muted" href="#">Trekking</a>
                    </li>
                    <li>
                        <a class="text-muted" href="#">ATV Ride</a>
                    </li>
                </ul>
            </div>
            <div class="col-6 col-md">
                <h5>Tour</h5>
                <ul class="list-unstyled text-small">
                    <li>
                        <a class="text-muted" href="#">Full Day Tour</a>
                    </li>
                    <li>
                        <a class="text-muted" href="#">Half Day Tour</a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
    
    <div class="text-center py-3 copyright bg-primary text-white">Copyright &copy;
        <a href="<?= base_url(); ?>" class="a-footer text-white">Joyfulbali.com <script>document.write(new Date().getFullYear());</script> </a>
    </div>

    <script async src="https://cse.google.com/cse.js?cx=004566218386616212635:ht7uqmd5ezx"></script>
    <script type="text/javascript" src="<?= base_url(); ?>/assets/js/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/lightslider.js">"></script>
    <script src="<?= base_url(); ?>/assets/js/slick.min.js">"></script>
    <script type="text/javascript" src="<?= base_url(); ?>/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>/assets/js/fontawesome.min.js"></script>
    <script type="text/javascript" src="<?= base_url(); ?>/assets/js/main.js"></script>
    
</body>