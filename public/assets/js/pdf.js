
window.onload = function () {
    document.getElementById("download")
        .addEventListener("click", () => {
            const invoice = this.document.getElementById("invoice");
            console.log(invoice);
            console.log(window);
            var opt = {
                margin: 1,
                filename: 'myfile.pdf',
                image: { type: 'jpeg', quality: 10000 },
                html2canvas: { scrollX: 0,
                    scrollY: 0,
                    scale: window.devicePixelRatio  && window.devicePixelRatio > 0.4 ? 0.4 :.3},
                jsPDF: { unit: 'in', format: 'legal', orientation: 'portrait' }
            };
            html2pdf().from(invoice).set(opt).save();
        })
}
