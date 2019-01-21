<template>
    <div class="container">
       


        <template v-if="creatingPost">
            <div class="wholePostCreate">
               <form action="postUpload" method="post">

             <input type="hidden" name="_token" :value="csrf">

<div class="form-group">
    <label for="exampleFormControlInput1">Post Title</label>
    <input name="postTitle" type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
  </div>
 
  
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Post Description</label>
    <textarea name="postDescription" class="form-control" id="exampleFormControlTextarea1" rows="3" ></textarea>
  </div>      

  <p class="submitPost">    
    <input  type="submit" class="myButton" value="Submit">
    <input  @click="creatingPost = false" type="button" class="myDangerButton" value="Cancel">
</p>   
<!-- <input type="submit" value=""> -->

  
  
        </form>
            </div>
        </template>


        <ul class="allPostsUL" v-if="!creatingPost">

            <li v-for="posts in posts" class="allPosts">
                <!-- <div class="outerDiv">
                    <p class="profileNameWithImg">
                        {{posts.users.name}}
                        <img class="profileImg" :src="posts.users.image" >
                    </p>


                <p class="postDesc">
                {{posts.postDescription}}

                          </p>


                          <p class="postTitle">
                    {{posts.postTitle}}

                          </p>
                </div> -->
<div class="bd-snippet-preview ">
<article class="media">
  <figure class="media-left">
    <p class="image is-64x64">
      <img :src="posts.users.image">
    </p>
  </figure>
  <div class="media-content">
    <div class="content">
      <p>
          <span class="inlineName">
        <strong>{{posts.users.name}}</strong> 
          </span>
        
        <small> </small> {{posts.postTitle}} 
        <br>
        {{posts.postDescription}}
      </p>
    </div>
    <nav class="level is-mobile">
      
    </nav>
  </div>
 
</article>
</div>

                
            </li>




        <!-- <div class="bd-snippet-preview ">
<article class="media">
  <figure class="media-left">
    <p class="image is-64x64">
      <img src="https://bulma.io/images/placeholders/128x128.png">
    </p>
  </figure>
  <div class="media-content">
    <div class="content">
      <p>
          <span class="inlineName">
        <strong>Name Here</strong> 
          </span>
        
        <small> </small> Title here 
        <br>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ornare magna eros, eu pellentesque tortor vestibulum ut. Maecenas non massa sem. Etiam finibus odio quis feugiat facilisis.
      </p>
    </div>
    <nav class="level is-mobile">
      
    </nav>
  </div>
 
</article>

    </div> -->









            <!-- <li v-for="posts in posts">
                

                <p>{{posts.postTitle}}</p>
                <p>Created by {{posts.users.name}}</p>
                <p>{{posts.postDescription}}</p> -->


                <!-- {{posts}} -->
                
                
                <!-- </li> -->
        </ul>
<span class="mySpanBtn">
    <a @click="creatingPost = true" type="button" class="myButton">Create new post</a>
</span>

    </div>


    
</template>

<script>
    export default {
        data: function(){
            return {
                creatingPost: false,
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        },
        props: ['posts']
    }
</script>

<style scoped>


    .myButton {
background-color: #258de8;
    border-radius: 28px;
    border: 1px solid #ffffff;
    display: inline-block;
    cursor: pointer;
    color: #ffffff;
    font-family: Arial;
    font-size: 15px;
    padding: 14px 19px;
    text-decoration: none;
    margin-left: 210px;
}

.myDangerButton{
background-color: #f72c2c;
    border-radius: 28px;
    border: 1px solid #ffffff;
    display: inline-block;
    cursor: pointer;
    color: #ffffff;
    font-family: Arial;
    font-size: 15px;
    padding: 14px 19px;
    text-decoration: none;
}

.form-control{
    display: block;
    width: 100%;
    height: calc(2.25rem + 2px);
    padding: .375rem .75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
}

.submitPost{
text-align: center;
    margin-left: 33px;
    }

.wholePostCreate{
    margin-top: 25px
}


.outerDiv{
    background: beige;
    width: 500px;
    height: 235px;
    border-radius: 50px;
    position: relative;
}

.profileNameWithImg{
    text-align: center;
}

.profileImg{
    height: 50px;
    width: 50px;
    border-radius: 50px;
    vertical-align: middle;
    margin-left: 14px;
    margin-top: 8px;
}


.postDesc{
    text-align: center;
    margin-top: 47px;
}

.postTitle{
    position: absolute;
    bottom: 0;
    right: 183px;
}

.allPosts{
    list-style: none;
    /* margin-top: 475px; */
}

.allPosts:hover{
    /* background: #eadfdf; */
}

.allPostsUL{
    /* margin-top: 475px; */
}

.bd-snippet-preview {
    padding: 1.5rem;
}

.media {
    align-items: flex-start;
    display: flex;
    text-align: left;
}

.media-left {
    margin-right: 1rem;
}

.media-left, .media-right {
    flex-basis: auto;
    flex-grow: 0;
    flex-shrink: 0;
    margin-left: 5px
}

.image.is-64x64 img {
    height: 64px;
    width: 64px;
}

.image {
    display: block;
    position: relative;
}

.media-content {
    flex-basis: auto;
    flex-grow: 1;
    flex-shrink: 1;
    text-align: left;
}

.bd-snippet-preview{
    border: 1px solid black;
    width: 500px;
    margin: auto;
    margin-top: 15px;
    margin-bottom: 15px;
}

.inlineName{
    margin-right: 25px;
}

.mySpanBtn{
display: inline-block;
    position: absolute;
    top: 146px;
    left: 324px;
    }

.is-64x64 img{
    border-radius: 50px;
}

.container{
    /* margin-top: 268px; */
}

 </style>
