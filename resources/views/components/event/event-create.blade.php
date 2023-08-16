<div class="modal" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <form id="insertData">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Event</h5>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Event Title *</label>
                                <input type="text" class="form-control" id="eventTitle">
                                <label class="form-label">Date *</label>
                                <input type="date" class="form-control" id="eventDate">
                                <label class="form-label">Time *</label>
                                <input type="time" class="form-control" id="eventTime">
                                <label class="form-label">Location *</label>
                                <input type="text" class="form-control" id="eventLocation">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" name="" id="eventDetails" cols="30" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="modal-close" class="btn btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button class="btn btn-sm  btn-success" >Save</button>
                </div>
            </div>
        </form>
    </div>
</div>


<script>

    $("#insertData").on('submit',async function (e) {
        e.preventDefault();

        let eventTitle = $('#eventTitle').val();
        let eventDate = $('#eventDate').val();
        let eventTime = $('#eventTime').val();
        let eventLocation = $('#eventLocation').val();
        let eventDetails = $('#eventDetails').val();

        if (eventTitle.length === 0) {
            errorToast("Title Required !")
        }
        else if(eventDate.length===0){
            errorToast("Date Required !")
        }
        else if(eventTime.length===0){
            errorToast("Time Required !")
        } else {
            $('#create-modal').modal('hide');
            showLoader();
            let res = await axios.post("/create-event",{title:eventTitle,date:eventDate,time:eventTime,location:eventLocation,description:eventDetails})
            hideLoader();
            if(res.status===201){
                successToast('Event Created Successfully!');
                $("#insertData").trigger("reset");
                await getList();
            }
            else{
                errorToast("Request fail !")
            }

        }

    });


</script>
