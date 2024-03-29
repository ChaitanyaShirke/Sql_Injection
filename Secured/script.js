document.getElementById('retrieve-form').addEventListener('submit', function(event) {
  event.preventDefault();
  const formData = new FormData(this);

  fetch('retrieve.php', {
    method: 'POST',
    body: formData
  })
  .then(response => response.text())
  .then(data => {
    document.getElementById('results').innerHTML = data;
    // Show download button when results are displayed
    document.getElementById('download-btn').style.display = 'inline-block';
  })
  .catch(error => console.error('Error:', error));
});

document.getElementById('download-btn').addEventListener('click', function() {
  const table = document.getElementById('results-table');
  const rows = table.querySelectorAll('tr');
  let csv = '';

  rows.forEach(function(row) {
    const cells = row.querySelectorAll('th, td');
    const rowData = Array.from(cells).map(cell => cell.textContent);
    csv += rowData.join(',') + '\n';
  });

  // Create a Blob from the CSV data
  const blob = new Blob([csv], { type: 'text/csv' });
  const url = window.URL.createObjectURL(blob);

  // Create a temporary anchor element and trigger the download
  const a = document.createElement('a');
  a.href = url;
  a.download = 'patient_information.csv';
  document.body.appendChild(a);
  a.click();

  // Cleanup
  window.URL.revokeObjectURL(url);
  document.body.removeChild(a);
});
