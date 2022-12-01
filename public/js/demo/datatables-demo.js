// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable({
      "info": false,
      "pageLength": 10,
      language: {
          url: 'https://cdn.datatables.net/plug-ins/1.13.1/i18n/fr-FR.json'
      },
      order:[[0,"desc"]]
  });
});
