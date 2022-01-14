$('#contactForm').submit(function (e) {
    e.preventDefault();
    submitForm();
});

function submitForm(){
    var response = grecaptcha.getResponse();

    if(response.length == 0) 
    { 
        //reCaptcha not verified
        alert("please verify you are humann!"); 
        return false;
    }
    else {
        let formEl = document.forms.contactForm;
        let formData = new FormData(formEl);

        let name = formData.get('name');
        let company = formData.get('company');

        let email = formData.get('email');
        let phone = formData.get('phone');
        // let securities = formData.get('interest[]');
        let reach = formData.get('reach');
        let hear = formData.get('hear');
        let message = formData.get('message');
        
        
        let interests = document.getElementsByName('interest'); 
        console.log(interests);
        let interestsArray = "";
        
        for(var i = 0; i < interests.length; i++)  
        {  
            if(interests[i].checked){
                console.log("Checked");
                const data = interests[i].value
                if(interestsArray.length < 1){
                    interestsArray += data;
                }
                
                else {
                    interestsArray += ", " + data;
                }
            } 
        } 
        
        console.log("Interests: ", interestsArray);

        // console.log("Name: ", name);
        // console.log("Company: ", company);
        // console.log("Email: ", email);
        // console.log("Phone: ", phone);
        // console.log("Interest: ", interest);
        // console.log("Reach: ", reach);
        // console.log("Hear: ", hear);
        // console.log("Message: ", message);
        
        const data = {
                name: name,
                company: company,
                email: email,
                phone: phone,
                interest: interestsArray,
                reach: reach,
                hear: hear,
                message: message,
            };

            const options = {
                method: 'POST',
                headers: {
                'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            }

            console.log(options);

            fetch(api_base + 'api/messages', options)
            .then(data => {
                    // return data.json();
                    console.log(data.json());
                    $('#contactForm').trigger('reset');
                    //alert("We have received your message");
                    $('#sent_info').show();
                    $('#sent_info_2').show();
                    
                })
    }

}




// function submitForm2(api_base){

//     var response = grecaptcha.getResponse();

//     console.log("Captcha: ", response);

//     if(response.length == 0) 
//     { 
//         //reCaptcha not verified
//         alert("please verify you are humann!"); 
//         return true;
//     }
//     else {
//         let formEl = document.forms.contactForm;
//         let formData = new FormData(formEl);

//         let name = formData.get('name');
//         let company = formData.get('company');
//         let email = formData.get('email');
//         let phone = formData.get('phone');
//         let interest = formData.get('interest[]');
//         let reach = formData.get('reach');
//         let hear = formData.get('hear');
//         let message = formData.get('message');

//         const message = {
//             name,
//             company,
//             email,
//             phone,
//             interest,
//             reach,
//             hear,
//             message,
//         };

//         const options = {
//             method: 'POST',
//             headers: {
//             'Content-Type': 'application/json',
//             },
//             body: JSON.stringify(message),
//         }

//         fetch(api_base + 'api/route', options)
//         .then(data => {
//             if (!data.ok) {
//                 throw Error(data.status);
//             }
//             // return data.json();
//             })
//     }

// }