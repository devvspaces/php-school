	$(document).ready(function() {
  $.uploadPreview({
    input_field: "#image-upload",   // Default: .image-upload
    preview_box: "#image-preview",  // Default: .image-preview
    label_field: "#image-label",    // Default: .image-label
    label_default: "Select",   // Default: Choose File
    label_selected: "Select",  // Default: Change File
    no_label: false                 // Default: false
  });
});
