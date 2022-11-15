$(document).ready(() => {
  $('#productos').DataTable({
    "scrollY": "400px",
    "scrollCollapse": true,
    "paging": false,
    "searching": false,
    "info" : false
  });
});