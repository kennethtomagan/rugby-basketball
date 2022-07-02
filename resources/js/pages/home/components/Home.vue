<template>
    <div class="row">
        <div class="col-md-12">
            <div class="title-container">
                <h2 class="is-size-1 title" style="font-size: 90px !important;">Rugby and Basketball</h2>
            </div>
        </div>
        <div class="col-md-4 col-offset-2  offset-md-2">
        <router-link to="/rugby">
            <div class="card card-01">
            <img class="card-img-top" src="https://i.ytimg.com/vi/kkLB_3QFr5U/maxresdefault.jpg" alt="Card image cap">
            <div class="card-body">
                <span class="badge-box"><i class="fa fa-check"></i></span>
                <h4 class="card-title">Rugby Player</h4>
                <a href="#" class="btn btn-primary text-white">Visit Page</a>
            </div>
            </div>
        </router-link>
        </div>
        <div class="col-md-4">
        <router-link to="/nba">
            <div class="card card-01">
            <img class="card-img-top" src="https://images5.alphacoders.com/467/467394.jpg" alt="Card image cap">
            <div class="card-body">
                <span class="badge-box"><i class="fa fa-check"></i></span>
                <h4 class="card-title">NBA Player</h4>
                <a href="#" class="btn btn-primary text-white">Visit Page</a>
            </div>
            </div>
        </router-link>
        </div>
    </div>
</template>

<script setup>
</script>
<style scoped>
.title-container{
    height: 90%;
    text-align: center;
    display: table;
    width: 100%;
    margin-bottom: 50px;
}
.text-white {
    color: #fff;
}
.card-body{
    width: 100%;
}
a {
    text-decoration: none;
    color:inherit;
}

img{
    height: 300px;
}
a:link { text-decoration: none; }

a:visited { text-decoration: none; }

a:hover { text-decoration: none; }

a:active { text-decoration: none; }

.card{
  box-shadow:2px 2px 20px rgba(0,0,0,0.3); border:none; margin-bottom:30px;
    height: 450px;
    background-color: #fff;
}

.card:hover{
  transform: scale(1.05);
  transition: all 1s ease;
  z-index: 999;
}
.card-01 .card-body{
  position:relative; padding-top:40px;
}
.card-01 .badge-box{
  position:absolute; 
  top:-20px; left:50%; width:100px; height:100px;margin-left:-50px; text-align:center;
}
.card-01 .badge-box i{
  background:#006EFF; color:#fff; border-radius:50%;  width:50px; height:50px; line-height:50px; text-align:center; font-size:20px;
}
.card-01 .height-fix{
  height:455px; overflow:hidden;
}

.card-01 .height-fix .card-img-top{width:auto!imporat;}

</style>