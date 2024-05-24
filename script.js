
document.addEventListener('DOMContentLoaded', () => {
    const fileInput = document.getElementById('archivos');
    const filesContainer = document.getElementById('files-container');

    fileInput.addEventListener('change', (event) => {
        const files = event.target.files;
        
        for (const file of files) {
            const fileDiv = document.createElement('div');
            fileDiv.className = 'files-list';
            
            const fileIcon = document.createElementNS("http://www.w3.org/2000/svg", "svg");
            fileIcon.setAttribute("xmlns", "http://www.w3.org/2000/svg");
            fileIcon.setAttribute("viewBox", "0 0 256 256");
            fileIcon.innerHTML = '<path d="m220.49 59.51l-40-40A12 12 0 0 0 172 16H92a20 20 0 0 0-20 20v20H56a20 20 0 0 0-20 20v140a20 20 0 0 0 20 20h108a20 20 0 0 0 20-20v-20h20a20 20 0 0 0 20-20V68a12 12 0 0 0-3.51-8.49M160 212H60V80h67l33 33Zm40-40h-16v-64a12 12 0 0 0-3.51-8.49l-40-40A12 12 0 0 0 132 56H96V40h71l33 33Zm-56-28a12 12 0 0 1-12 12H88a12 12 0 0 1 0-24h44a12 12 0 0 1 12 12m0 40a12 12 0 0 1-12 12H88a12 12 0 0 1 0-24h44a12 12 0 0 1 12 12"/>';
            
            const fileName = document.createElement('p');
            fileName.textContent = file.name;
            
            const removeButton = document.createElement('button');
            removeButton.type = 'button';
            removeButton.className = 'remove-file';
            removeButton.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M3.47 3.47a.75.75 0 0 1 1.06 0L8 6.94l3.47-3.47a.75.75 0 1 1 1.06 1.06L9.06 8l3.47 3.47a.75.75 0 1 1-1.06 1.06L8 9.06l-3.47 3.47a.75.75 0 0 1-1.06-1.06L6.94 8L3.47 4.53a.75.75 0 0 1 0-1.06" clip-rule="evenodd"/></svg>';

            removeButton.addEventListener('click', () => {
                fileDiv.remove();
            });
            
            fileDiv.appendChild(fileIcon);
            fileDiv.appendChild(fileName);
            fileDiv.appendChild(removeButton);
            
            filesContainer.appendChild(fileDiv);
        }
        fileInput.value = '';
    });
});