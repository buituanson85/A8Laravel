const photo = document.getElementById("photo");
const previewContainer2 = document.getElementById("imagePreview2");
const previewImage2 = previewContainer2.querySelector(".image-preview__image2");
const previewDefaultText2 = previewContainer2.querySelector(".image-preview__default-text2");

photo.addEventListener("change", function () {
    const file = this.files[0];

    if (file){
        const reader = new FileReader();
        previewDefaultText2.style.display = "none";
        previewImage2.style.display = "block";

        reader.addEventListener("load", function () {
            previewImage2.setAttribute("src", this.result);
        });

        reader.readAsDataURL(file);
    }else {
        previewDefaultText2.style.display = null;
        previewImage2.style.display = null;
    }
});
