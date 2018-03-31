<?php include 'templates/header.php';?>
<script type="text/javascript">
function jumping(){ window.open('<?=site_url("j/n/") ?>'+$("input").val())}
</script>
<div class="block-idx1">
  <div class="container_big">
    <img src="<?=image_url("head_x.jpg")?>" alt="" style="">
    <div>
      <h1>Jerry Xu</h1>
      <p>Shanghai Jiao Tong University</p>
      <p>Zhiyuan College ACM 2013</p>
      <button class="btn_new">More</button>
    </div>
  </div>
</div>
<div class="container_big">
<div class="row">
  <div class = "col-sm-4">
    <div class="block-1"><h1>Jumping Service</h1></div>
    <div class="block-1 orange">
      <input type="text">
      <button class="btn_new" type="button" onclick="jumping()">Jump</button>
      <p><a href="http://fei960922.sinaapp.com/index.php/j/">New</a></p>
    </div>
    <div class="block-1"><h1>Resources</h1></div>
    <div class="block-1 blue">
      <div class="block-2 block-33"><h3>大一</h3><h5>第一学期</h5></div>
      <div class="block-2 block-33"><h3>大一</h3><h5>第二学期</h5></div>
      <div class="block-2 block-33"><h3>大二</h3><h5>第一学期</h5></div>
      <div class="block-2 block-33"><h3>大二</h3><h5>第二学期</h5></div>
      <div class="block-2 block-33"><h3>大三</h3><h5>第一学期</h5></div>
      <div class="block-2 block-33"><h3>大三</h3><h5>第二学期</h5></div>
    </div>
    <div class="block-1"><h1>Friendly Link</h1></div>
    <div class="block-1 orange">
      <h5><a href="http://zyho.me">章鱼の小站</a></h5>
    </div>
  </div>
  <div class = "col-sm-6">
    <div class="posts grey">
      <h1>Posts</h1>
      {% for post in site.posts %}
        <div>
          <span class="post-date">{{ post.date | date: "%b %-d, %Y" }}</span>
          <a class="post-link" href="{{ post.url | prepend: site.baseurl }}">{{ post.title }}</a>
        </div>
        {% endfor %}
    </div>
  </div>
  <div class="col-sm-2">
    <div class="block-1 advertise"><h1>Links</h1></div>
  </div>
</div>
</div>
<?php include 'templates/footer.php';?>