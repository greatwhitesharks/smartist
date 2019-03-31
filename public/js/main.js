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

editProfileButton.addEventListener("click", function(){
	editProfileModal.classList.add("show");
	editProfileModal.style.display = 'block';
});

uploadButton.addEventListener("click", function(){
	uploadModal.classList.add("show");
	uploadModal.style.display = 'block';
});



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