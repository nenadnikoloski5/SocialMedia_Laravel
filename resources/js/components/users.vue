

<template>
    <div class="container">
       <!-- These are the users var passed {{ users }} -->
       <!-- <slot> </slot> -->



       <div id="userPictures">
          
  <!-- <img @mouseover='onHover($event)' :key="users[0].id" class="userPicture" :src="users[0].image" alt="">
  <img @mouseover='onHover' class="userPicture" :src="users[0].image" alt="">
  <img @mouseover='onHover' class="userPicture" :src="users[0].image" alt="">
  <img @mouseover='onHover' class="userPicture" :src="users[0].image" alt="">
  <img @mouseover='onHover' class="userPicture" :src="users[0].image" alt="">
  <img @mouseover='onHover' class="userPicture" :src="users[0].image" alt=""><img @mouseover='onHover' class="userPicture" :src="users[0].image" alt=""><img @mouseover='onHover' class="userPicture" :src="users[0].image" alt=""><img @mouseover='onHover' class="userPicture" :src="users[0].image" alt=""> -->
    <p>
    <!-- current is {{current}}  -->

    </p>
    <template v-for="user in users">
     <img @mouseover='onHover(user)' class="userPicture" :src="user.image" alt="">
     <!-- {{user.name}} -->

    </template>

       </div>

       <div id="userInfo">
           <!-- User Info -->



           <template v-if="userId">

                        <p class="userProfileName"> {{userName}} </p> 

               <img class="userPictureInfo"  :src="userId" alt="">
 
           <p class="userDesc">{{userDesc}}</p> 

<p class="userProfileLink">         
   
</p>

           </template>

        <template v-else>
             <p id="ifNotHovered">Hover over an image to view profile</p>
           </template>

           
       </div>
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
           current: '',
           userName: '',
            userId: false,
            userDesc: '',
            }
        },
        props: ["users"],
        methods: {
            onHover(data){
                this.current = data.id;
                this.userName = data.name;
                this.userId = data.image;
                this.userDesc = data.description;
            }
        }
    }
</script>

<style scoped>


.container {
width: 50%;
height: 75%;
    }

    #userPictures{
        height: 100%;
    width: 50%;
    display: inline-block;
    background: #f2f0f0;
    }

    #userInfo{
        display: inline-block;
        height: 75%;
    width: 25%;
    background: #e5f8f4;

    position: absolute;
    }

    .userPicture{
        height: 50px;
        width: 50px;
        border-radius: 50px;
        margin: 15px;
        margin-right: 27px;
    }

    .userPictureInfo{
height: 100px;
    width: 100px;
    border-radius: 50px;
    margin: 15px;
    margin-right: 27px;
    margin: 15px;
    margin-right: 27px;
    margin-left: 188px;
    margin-top: 15px;
    }

    .myButton {
	background-color:#258de8;
	-moz-border-radius:28px;
	-webkit-border-radius:28px;
	border-radius:28px;
	border:1px solid #ffffff;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:17px;
	padding:16px 31px;
	text-decoration:none;
}

.userProfileName{
  text-align: center;
    margin-top: 50px;
    font-weight: bold; 
    font-size: 26px;  
}

.userDesc{
margin: 30px 50px;
text-align: center;
}

.userProfileLink{
    text-align: center;
}

#ifNotHovered{
        margin-top: 220px;
    text-align: center;
    font-weight: bold;
    font-size: 20px;
}

</style>