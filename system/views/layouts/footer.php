      <!-- footer Start -->
      <footer>
          <div class="footer-top section-pb section-pt-60">
              <div class="container">
                  <div class="row">
                      <div class="col-lg-5 col-md-6">
                          <div class="widget-footer mt-10">
                              <h6 class="title-widget"><i class="fa fa-phone"></i> &nbsp;Liên hệ</h6>
                              <div class="footer-addres">
                                  <div class="widget-content mb--20">
                                      <p>Địa chỉ: 39 Đường số 1, Khu phố 1, Phường Tân Phong, Quận 7, TP.HCM</p>
                                      <p>Điện thoại: <a href="tel:<?= $settings['phone']; ?>"><?= format_phone($settings['phone']); ?></a></p>
                                      <p>Email: <a href="mailto:<?= $settings['email']; ?>"><?= $settings['email']; ?></a></p>
                                  </div>
                              </div>

                              <ul class="social-icons">
                                  <li>
                                      <a class="facebook social-icon" href="#" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                                  </li>
                                  <li>
                                      <a class="twitter social-icon" href="#" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                                  </li>
                                  <li>
                                      <a class="instagram social-icon" href="#" title="Instagram" target="_blank"><i class="fa fa-instagram"></i></a>
                                  </li>
                                  <li>
                                      <a class="linkedin social-icon" href="#" title="Linkedin" target="_blank"><i class="fa fa-linkedin"></i></a>
                                  </li>
                                  <li>
                                      <a class="rss social-icon" href="#" title="Rss" target="_blank"><i class="fa fa-rss"></i></a>
                                  </li>
                              </ul>

                          </div>

                      </div>
                      <div class="col-lg-3 col-md-6 col-sm-6">
                          <div class="widget-footer mt-10">
                              <h6 class="title-widget"><i class="fa fa-info-circle"></i> &nbsp;Thông tin</h6>
                              <ul class="footer-list">
                                  <li><a href="/">Trang chủ</a></li>
                                  <li><a href="/about-us">Giới thiệu</a></li>
                                  <li><a href="#contact">Liên hệ</a></li>
                                  <li><a href="#">Blog</a></li>
                                  <li><a href="#">Điều khoản và điều kiện</a></li>
                              </ul>
                          </div>
                      </div>
                      <div class="col-lg-4 col-md-6">
                          <div class="widget-footer mt-10">
                              <div class="mt-10">
                                  <h6 class="title-widget"><i class="fa fa-map-marker"></i> &nbsp;Vị trí cửa hàng</h6>
                                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.800995363982!2d106.71804047469793!3d10.826536089325282!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752881823d0fd5%3A0xd22e8c05452a8699!2zMzkgxJAuIFPhu5EgMTksIEhp4buHcCBCw6xuaCBDaMOhbmgsIFRo4bunIMSQ4bupYywgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1751804433283!5m2!1svi!2s" width="100%"
                                      height="200"
                                      style="border:0;"
                                      allowfullscreen=""
                                      loading="lazy"
                                      referrerpolicy="no-referrer-when-downgrade">>
                                  </iframe>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <div class="footer-bottom">
              <div class="container">
                  <div class="row align-items-center">
                      <div class="col-lg-6 col-md-6">
                          <div class="copy-left-text">
                              <p>Copyright &copy; <a href="https://naminc.dev"><?= strtoupper($settings['owner']); ?></a> <?= date('Y'); ?>. All Right Reserved.</p>
                          </div>
                      </div>
                      <div class="col-lg-6 col-md-6">
                          <div class="copy-right-image">
                              <img src="/assets/images/icon/img-payment.png" alt="">
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </footer>
      <!-- footer End -->
      <!-- Modal -->
      <div class="modal fade modal-wrapper" id="exampleModalCenter">
          <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                  <div class="modal-body">
                      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                      <div class="modal-inner-area">
                          <div class="row gx-3 product-details-inner">
                              <div class="col-lg-5 col-md-6 col-sm-6">
                                  <!-- Product Details Left -->
                                  <div class="product-large-slider">
                                      <div class="pro-large-img">
                                          <img src="/assets/images/product/product-01.png" alt="product-details" />
                                      </div>
                                      <div class="pro-large-img">
                                          <img src="/assets/images/product/product-02.png" alt="product-details" />
                                      </div>
                                      <div class="pro-large-img ">
                                          <img src="/assets/images/product/product-03.png" alt="product-details" />
                                      </div>
                                      <div class="pro-large-img">
                                          <img src="/assets/images/product/product-04.png" alt="product-details" />
                                      </div>
                                      <div class="pro-large-img">
                                          <img src="/assets/images/product/product-05.png" alt="product-details" />
                                      </div>

                                  </div>
                                  <div class="product-nav">
                                      <div class="pro-nav-thumb">
                                          <img src="/assets/images/product/product-01.png" alt="product-details" />
                                      </div>
                                      <div class="pro-nav-thumb">
                                          <img src="/assets/images/product/product-02.png" alt="product-details" />
                                      </div>
                                      <div class="pro-nav-thumb">
                                          <img src="/assets/images/product/product-03.png" alt="product-details" />
                                      </div>
                                      <div class="pro-nav-thumb">
                                          <img src="/assets/images/product/product-04.png" alt="product-details" />
                                      </div>
                                      <div class="pro-nav-thumb">
                                          <img src="/assets/images/product/product-05.png" alt="product-details" />
                                      </div>
                                  </div>
                                  <!--// Product Details Left -->
                              </div>

                              <div class="col-lg-7 col-md-6 col-sm-6">
                                  <div class="product-details-view-content">
                                      <div class="product-info">
                                          <h3>Single product One</h3>
                                          <div class="product-rating d-flex">
                                              <ul class="d-flex">
                                                  <li><a href="#"><i class="icon-star"></i></a></li>
                                                  <li><a href="#"><i class="icon-star"></i></a></li>
                                                  <li><a href="#"><i class="icon-star"></i></a></li>
                                                  <li><a href="#"><i class="icon-star"></i></a></li>
                                                  <li><a href="#"><i class="icon-star"></i></a></li>
                                              </ul>
                                              <a href="#reviews">(<span class="count">1</span> customer review)</a>
                                          </div>
                                          <div class="price-box">
                                              <span class="new-price">$70.00</span>
                                              <span class="old-price">$78.00</span>
                                          </div>
                                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor.</p>

                                          <div class="single-add-to-cart">
                                              <form action="#" class="cart-quantity d-flex">
                                                  <div class="quantity">
                                                      <div class="cart-plus-minus">
                                                          <input type="number" class="input-text" name="quantity" value="1" title="Qty">
                                                      </div>
                                                  </div>
                                                  <button class="add-to-cart" type="submit">Add To Cart</button>
                                              </form>
                                          </div>
                                          <ul class="single-add-actions">
                                              <li class="add-to-wishlist">
                                                  <a href="wishlist.html" class="add_to_wishlist"><i class="icon-heart"></i> Add to Wishlist</a>
                                              </li>
                                          </ul>
                                          <ul class="stock-cont">
                                              <li class="product-stock-status">Categories: <a href="#">Watchs,</a> <a href="#">Man Watch</a></li>
                                              <li class="product-stock-status">Tag: <a href="#">Man</a></li>
                                          </ul>
                                          <div class="share-product-socail-area">
                                              <p>Share this product</p>
                                              <ul class="single-product-share">
                                                  <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                  <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                  <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                              </ul>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      </div>
      <script src="/assets/js/vendor/modernizr-3.6.0.min.js"></script>
      <script src="/assets/js/vendor/jquery-migrate-3.4.0.min.js"></script>
      <script src="/assets/js/vendor/bootstrap.min.js"></script>
      <script src="/assets/js/plugins/slick.min.js"></script>
      <script src="/assets/js/plugins/jquery.nice-select.min.js"></script>
      <script src="/assets/js/plugins/countdown.min.js"></script>
      <script src="/assets/js/plugins/image-zoom.min.js"></script>
      <script src="/assets/js/plugins/fancybox.js"></script>
      <script src="/assets/js/plugins/scrollup.min.js"></script>
      <script src="/assets/js/plugins/jqueryui.min.js"></script>
      <script src="/assets/js/plugins/ajax-contact.js"></script>
      <script src="/assets/js/main.js"></script>
      <!-- custom js -->
      <script src="/assets/js/custom.js?=<?= time(); ?>"></script>
      </body>

      </html>