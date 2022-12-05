const showImage = (event) => {
    document.getElementById("image_input").style.display = "none"
  let file = event.target.files[0];
  let fileReader = new FileReader()
  fileReader.readAsDataURL(file);
  fileReader.onload = () => {
        let image = fileReader.result;
       document.getElementById("profile_image").style.display = "block"
       document.getElementById("profile_image").src = image;
       document.getElementById("profile_image_label").style.display = "none"
  }
  
}