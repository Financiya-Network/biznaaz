  <?php if(isset($allrecord->User->slug)): ?>
      <div class="item-service col-md-6 col-lg-4 col-xl-3 col-12">
          <article
              class="map-item service-item post-5557 service type-service status-publish has-post-thumbnail hentry location-new-york service_category-development-it service_category-programming-tech"
              data-latitude="40.77229478697032" data-longitude="-73.92725741145593">
              <div class="position-relative">
                  <div class="service-image">
                      <?php
                      $gigimgname = '';
                      if ($allrecord->Image) {
                          foreach ($allrecord->Image as $gigimage) {
                              if (isset($gigimage->name) && !empty($gigimage->name)) {
                                  $path = 'public/files/gigs/full/' . $gigimage->name;
                                  if (file_exists($path) && !empty($gigimage->name)) {
                                      $gigimgname = 'public/files/gigs/full/' . $gigimage['name'];
                                      break;
                                  }
                              }
                          }
                      }
                      if ($gigimgname == '' && $allrecord->youtube_image) {
                          if (file_exists('public/files/gigs/full/' . $allrecord->youtube_image)) {
                              $gigimgname = 'public/files/gigs/full/' . $allrecord->youtube_image;
                          }
                      }
                      if ($gigimgname == '') {
                          $gigimgname = 'public/files/gigs/full/';
                      }
                      ?>
                      <a href="<?php echo e(URL::to('gig-details/' . $allrecord->slug)); ?>">
                          <div class="image-wrapper">

                              <?php echo e(HTML::image($path, SITE_TITLE, ['style' => 'width:400px;height:260px'])); ?>

                              
                              
                          </div>
                      </a>
                  </div>
                  <div>
                      <a class="btn-add-service-favorite" data-service_id="5557" data-nonce="a1a2911e0b"
                          data-bs-toggle="tooltip"> <?php echo $__env->make('elements.likeunlike', ['gid' => $allrecord->id], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                          
                          
                      </a>
                  </div>
              </div>
              <div class="service-information">
                  <div class="category-service">
                      <a href="<?php echo e(URL::to('public-profile/' . $allrecord->User->slug)); ?>"
                          style=""><?php echo e($allrecord->User->first_name . ' ' . $allrecord->User->last_name); ?></a>
                  </div>

                  <h2 class="service-title"><a href="<?php echo e(URL::to('gig-details/' . $allrecord->slug)); ?>"
                          rel="bookmark"><?php echo e(mb_substr($allrecord->title, 0, 40)); ?></a>
                  </h2>
                  <div class="rating-reviews">
                      <i class="fa fa-star"></i>
                      <span class="rating"><?php echo e($allrecord->User->average_rating); ?></span>
                      <span class="text">(<?php echo e($allrecord->User->total_review); ?>

                          reviews)</span>
                  </div>
                  <div class="info-bottom d-flex align-items-center">
                      <div class="service-author">
                          <a href="<?php echo e(URL::to('public-profile/' . $allrecord->User->slug)); ?>">
                              <div class="freelancer-logo d-flex align-items-center">
                                  <?php //echo '<pre>';print_r($allrecord->User->profile_image);
                                  ?>
                                  <?php if(isset($allrecord->User->profile_image)): ?>
                                      <?php if(file_exists('public/files/users/full/' . $allrecord->User->profile_image) &&
                                              !empty($allrecord->User->profile_image)): ?>
                                          <?php echo e(HTML::image('public/files/users/full/' . $allrecord->User->profile_image, SITE_TITLE)); ?>

                                      <?php else: ?>
                                          <?php echo e(HTML::image('public/img/front/dummy.png', SITE_TITLE)); ?>

                                      <?php endif; ?>
                                  <?php endif; ?>
                              </div>
                              <span class="text">
                                  <?php echo e($allrecord->User->first_name . ' ' . $allrecord->User->last_name); ?>

                              </span>
                          </a>
                      </div>
                      <div class="ms-auto">
                          <div class="service-salary with-title">
                              <span class="text">Starting at:</span>
                              <span>
                                  <span class="woocommerce-Price-amount amount">
                                      <bdi>
                                          <span class="woocommerce-Price-currencySymbol">&#36;</span>
                                          <a href="<?php echo e(URL::to('gig-details/' . $allrecord->slug)); ?>"
                                              class="amount_list"><?php echo e($allrecord->basic_price); ?></a>
                                      </bdi>
                                  </span>
                              </span>
                          </div>
                      </div>
                  </div>

              </div>
          </article><!-- #post-## -->

      </div>
      <script>
          function addtolike(gid, type) {
              $.ajax({
                  url: "users/likeunlike",
                  type: "POST",
                  data: {
                      'gid': gid,
                      'type': type,
                      _token: '<?php echo e(csrf_token()); ?>'
                  },
                  beforeSend: function() {
                      $('#lik' + gid).show();
                  },
                  complete: function() {
                      $('#lik' + gid).hide();
                  },
                  success: function(result) {
                      $('#likeunlikeid' + gid).html(result);
                  }
              });
          }

          <?php if(Session::get('user_id') && Session::get('user_id') > 0): ?>
              $(document).ready(function() {
                  getmessage();
              });

              function getmessage() {
                  $.ajax({
                      url: "check-new-notification",
                      type: "GET",
                      success: function(result) {
                          if (result == 1) {

                          } else {
                              $('#checkunreadmsg').removeClass('displaynone');
                              $('#msgcontaine').removeClass('displaynonenot');
                              $("#msgcontaine").html('');
                              servers = $.parseJSON(result);
                              $.each(servers, function(index, value) {
                                  $("#msgcontaine").append(
                                      '<li><a href="users/view-notification/' +
                                      value.url + '"><h3>' + value.message +
                                      '</h3><div class="job-tatle">' + value.from_name + '<span> ' +
                                      value.timeago + '</span></div></a></li>');
                              });
                          }
                      }
                  });
              }
              setInterval(function() {
                  getmessage();
              }, 30000);
          <?php endif; ?>
          $(document).ready(function() {
              $("img.lazy").lazyload();
          });
      </script>
  <?php endif; ?>
