const alertwindow = {
   
    init() {
        document.body.addEventListener("click", (e) => {

            if (e.target.classList.contains("alert_close")) {
                this.closealert(e.target);
            }
            
        });
       
    },
    gethtmltemplate(alertoption) {
        return `
    <div class="alert_overlay">
        <div class="alert_window">
            <div class="alert_titlebar ${alertoption.type}">
                <span class="alert_title"> ${alertoption.title} </span>
                <button class="alert_close fas fa-times "></button>
            </div>
            <div class="alert_content">
            ${alertoption.content} 
            </div>
        </div>
    </div>

`;
    },
    openalert(alertoption = {}) {
        alertoption = Object.assign({
            title: 'alert title',
            content: 'alert content',
            type:'danger'
        }, alertoption);



        const alerttemplate = this.gethtmltemplate(alertoption);
        document.body.insertAdjacentHTML("afterbegin", alerttemplate);
    },

    closealert(closebtn) {
        const alertoverlay =closebtn.parentElement.parentElement.parentElement;
        document.body.removeChild(alertoverlay);
    }


};

document.addEventListener("DOMContentLoaded", () => alertwindow.init());


