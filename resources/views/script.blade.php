<script>
    $(document).ready(function() {

        const deleteButton = document.getElementById('delete_button');
        const multyplayButton=document.getElementById('multiply_button');
        const sumButton=document.getElementById('sum_button');

        
        editModalWindow();
        createModalWindow();
        lineColorChange();

        multyplayButton.addEventListener('click', function() {
                const checkBoxes = document.getElementsByClassName('bytesChecked');
                let decimalNums = [];
                for (let i = 0; i < checkBoxes.length; i++) {
                    if (checkBoxes[i].checked) {
                        let decimalNum = checkBoxes[i].parentElement.parentElement.getElementsByClassName('decimal');
                        decimalNums.push(decimalNum[0].innerHTML);
                    }
                }
                $.ajax({
                    type: 'POST'
                    , url: 'api/multy/'
                    , data: {
                        decimalNums: decimalNums
                    }
                }).done(function(data) {
                    alert(data);
                });

                
            });
        
            sumButton.addEventListener('click', function() {
                const checkBoxes = document.getElementsByClassName('bytesChecked');
                let decimalNums = [];
                for (let i = 0; i < checkBoxes.length; i++) {
                    if (checkBoxes[i].checked) {
                        let decimalNum = checkBoxes[i].parentElement.parentElement.getElementsByClassName('decimal');
                        decimalNums.push(decimalNum[0].innerHTML);
                    }
                }
                $.ajax({
                    type: 'POST'
                    , url: 'api/sum/'
                    , data: {
                        decimalNums: decimalNums
                    }
                }).done(function(data) {
                    alert(data);
                    location.reload();
                });

               
            });
        function createModalWindow() {
            const createbutton = document.getElementById('create_button');
            const modal = document.getElementById('editModal');
            const confirmButton = document.getElementById('confirmButton');
            createbutton.addEventListener('click', function(createEvent) {
                createEvent.preventDefault();
                $(confirmButton).off('click');
                $(confirmButton).on('click', function() {
                $.ajax({
                    type: 'POST'
                    , url: 'api/create/'
                    , data: {byte0: $('#bit0').val()
                        , byte1: $('#bit1').val()
                        , byte2: $('#bit2').val()
                        , byte3: $('#bit3').val()
                        , byte4: $('#bit4').val()
                        , byte5: $('#bit5').val()
                        , byte6: $('#bit6').val()
                        , byte7: $('#bit7').val()
                    , }
                });
                $(modal).modal('hide');
                location.reload();
            });
            });
        }

        function editModalWindow() {
            const editButtons = document.querySelectorAll('[data-target="#editModal"]');
            const modal = document.getElementById('editModal');
            const confirmButton = document.getElementById('confirmButton');
            for (let i = 0; i < editButtons.length; i++) {
                editButtons[i].addEventListener('click', function(editEvent) {
                    editEvent.preventDefault();
                    const numId = editButtons[i].getAttribute('numId');
                    $.ajax({
                        type: 'POST'
                        , url: 'api/get/' + numId
                    , }).done(function(data) {
                        $('#bit0').val(data.byte0?1:0);
                        $('#bit1').val(data.byte1?1:0);
                        $('#bit2').val(data.byte2?1:0);
                        $('#bit3').val(data.byte3?1:0);
                        $('#bit4').val(data.byte4?1:0);
                        $('#bit5').val(data.byte5?1:0);
                        $('#bit6').val(data.byte6?1:0);
                        $('#bit7').val(data.byte7?1:0);
                        $(confirmButton).off('click');
                        $(confirmButton).on('click', function() {
                $.ajax({
                    type: 'POST'
                    , url: 'api/change/'
                    , data: {
                        id: numId
                        , byte0: $('#bit0').val()
                        , byte1: $('#bit1').val()
                        , byte2: $('#bit2').val()
                        , byte3: $('#bit3').val()
                        , byte4: $('#bit4').val()
                        , byte5: $('#bit5').val()
                        , byte6: $('#bit6').val()
                        , byte7: $('#bit7').val()
                    , }
                }).done(function(){
                    $(modal).modal('hide');
                    location.reload();
                });
                
               
               
            });
                        
                    });
                    $(modal).modal('show');
                });
            }
        }

        

        deleteButton.addEventListener('click', function(deleteEvent) {
            deleteEvent.preventDefault();
            const checkBoxes = document.getElementsByClassName('bytesChecked');
            let numIds = [];
            for (let i = 0; i < checkBoxes.length; i++) {
                if (checkBoxes[i].checked) {
                    let id = checkBoxes[i].getAttribute('numId');
                    numIds.push(id);
                }
            }
            $.ajax({
                type: 'POST'
                , url: 'api/delete/'
                , data: {
                    numIds: numIds
                }
            }).done(function(){
                location.reload();
            });

           
        });  
        function lineColorChange() {
            const decimal = document.getElementsByClassName('decimal');
            for (let i = 0; i < decimal.length; i++) {
                if (decimal[i].textContent < 50) {
                    decimal[i].parentNode.style.backgroundColor='Red';
                }
                if (decimal[i].textContent >= 50 && decimal[i].textContent < 100) {
                    decimal[i].parentNode.style.backgroundColor='Yellow';
                }
                if (decimal[i].textContent >= 100) {
                    decimal[i].parentNode.style.backgroundColor='Lime';
                }
            }
        }
    });

    
   
    

</script>
