let menuButton = document.querySelector("#menu-button");

let menu = document.querySelector(menuButton.dataset.target);

menuButton.addEventListener("click", function() {
  if (menu.classList.contains("show")) {
    menu.classList.remove("show");
  } else {
    menu.classList.add("show");
  }
});


let editProfileButton = document.querySelector("#editProfile");
let editProfileModal = document.querySelector("#editProfileModal");
let uploadModal = document.querySelector("#uploadModal");
let uploadButton = document.querySelector("#uploadButton");
let followerModal = document.querySelector('#followerModal');
let followingModal = document.querySelector('#followingModal');

if(editProfileButton){
editProfileButton.addEventListener("click", function(){
	editProfileModal.classList.add("show");
	editProfileModal.style.display = 'block';
});
}

if(uploadButton){
uploadButton.addEventListener("click", function(){
	uploadModal.classList.add("show");
	uploadModal.style.display = 'block';
});
}



function closeEditProfileModal(){
		editProfileModal.classList.remove("show");
	editProfileModal.style.display = 'none';
}

function submitEditProfileForm(){
	document.querySelector("#editProfileModal form").submit();

}

function closeUploadModal(){
		uploadModal.classList.remove("show");
	uploadModal.style.display = 'none';
}

function submitUploadForm(){
	document.querySelector("#uploadModal form").submit();

}

function showFollowersModal(){
followerModal.classList.add("show");
followerModal.style.display = 'block';
}

function closeFollowersModal(){
	followerModal.classList.remove("show");
	followerModal.style.display = 'none';
}


function showFollowingModal(){
	followingModal.classList.add("show");
	followingModal.style.display = 'block';
	}
	
	function closeFollowingModal(){
		followingModal.classList.remove("show");
		followingModal.style.display = 'none';
	}