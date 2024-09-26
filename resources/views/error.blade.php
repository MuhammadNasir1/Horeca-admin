<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excel Import</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .error {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>

<body class="bg-gray-100 py-8">
    <div class=" mx-auto ">
        <h2 class="text-2xl font-bold mb-4">Upload Excel File</h2>

        <form id="excelForm" enctype="multipart/form-data">
            @csrf
            <input type="file" name="excel_file" class="mb-4">
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Submit</button>
        </form>

        <h2 class="text-2xl font-bold mb-4 mt-6">Uploaded Data</h2>
        <div class="flex justify-center">
            <div class=" w-[98vq] lg:w-[90vw] overflow-auto  px-10 border border-red-300">

                <table id="excelTable" class="min-w-full border-collapse block md:table">
                    <thead id="tableHeader" class="block md:table-header-group"></thead>
                    <tbody id="tableBody" class="block md:table-row-group"></tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#excelForm').on('submit', function(e) {
            e.preventDefault();

            let formData = new FormData(this);

            $.ajax({
                url: '/product/import',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    // Show Excel data in the table
                    generateTable(response.data, response.errors);
                },
                error: function(xhr) {
                    alert('Error occurred during file upload.');
                }
            });
        });

        function generateTable(data, errors) {
            const headerRow = data[0];
            const bodyRows = data.slice(1);
            const tableHeader = $('#tableHeader');
            const tableBody = $('#tableBody');

            tableHeader.empty();
            tableBody.empty();

            // Generate table header
            let headerHtml = '<tr class="border border-gray-300 md:table-row whitespace-nowrap">';
            headerRow.forEach((header) => {
                headerHtml +=
                    `<th class="p-2 text-left bg-gray-200 font-medium text-sm border border-gray-300">${header}</th>`;
            });
            headerHtml += '</tr>';
            tableHeader.append(headerHtml);

            // Generate table body with potential errors highlighted
            bodyRows.forEach((row, rowIndex) => {
                // Check if the row is null or empty, skip it
                if (!row.some(cell => cell !== null && cell !== "")) return;

                let rowHtml = '<tr class="border border-gray-300 md:table-row">';

                row.forEach((cell, colIndex) => {
                    let isError = false;
                    let headerText = headerRow[colIndex].toLowerCase(); // Make it lowercase

                    // Replace spaces with underscores in header for error matching
                    headerText = headerText.replace(/_/g, ' ').toLowerCase();

                    // Check if there's an error for this specific cell (row & column)
                    errors.forEach((error) => {
                        if (error.row === rowIndex + 2 && error.errors[
                                headerText]) { // Use space-separated headers for error checking
                            isError = true;
                        }
                    });

                    // Highlight only the columns (cells) with errors
                    rowHtml +=
                        `<td class="p-2 text-left border border-gray-300 ${isError ? 'error' : ''}">${cell ? cell : ''}</td>`;
                });

                rowHtml += '</tr>';
                tableBody.append(rowHtml);
            });
        }
    </script>
</body>

</html>
