<div class="modal" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <form id="updateForm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Event</h5>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Event Title *</label>
                                <input type="text" class="form-control" id="eventTitleUpdate">
                                <label class="form-label">Date *</label>
                                <input type="date" class="form-control" id="eventDateUpdate">
                                <label class="form-label">Time *</label>
                                <input type="time" class="form-control" id="eventTimeUpdate">
                                <label class="form-label">Location *</label>
                                <input type="text" class="form-control" id="eventLocationUpdate">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" name="" id="eventDetailsUpdate" cols="30" rows="3"></textarea>

                                <input type="text" class="d-none" id="updateID">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="modal-close" class="btn btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button class="btn btn-sm  btn-success" >Update</button>
                </div>
            </div>
        </form>
    </div>
</div>


<script>

    async function FillUpUpdateForm(id){
        $('#updateID').val(id);

        showLoader();
        let res=await axios.post("/edit-event",{id:id})
        hideLoader();

        $('#eventTitleUpdate').val(res.data['title']);
        $('#eventDateUpdate').val(res.data['date']);
        $('#eventTimeUpdate').val(res.data['time']);
        $('#eventLocationUpdate').val(res.data['location']);
        $('#eventDetailsUpdate').val(res.data['description']);
    }

    $("#updateForm").on('submit',async function (e) {
        e.preventDefault();

        let eventTitle = $('#eventTitleUpdate').val();
        let eventDate = $('#eventDateUpdate').val();
        let eventTime = $('#eventTimeUpdate').val();
        let eventLocation = $('#eventLocationUpdate').val();
        let eventDetails = $('#eventDetailsUpdate').val();
        let updateID = $('#updateID').val();

        if (eventTitle.length === 0) {
            errorToast("Title Required !");
        }
        else if(eventDate.length===0){
            errorToast("Date Required !");
        }
        else if(eventTime.length===0){
            errorToast("Time Required !");
        }
        else {

            $('#update-modal').modal('hide');

            showLoader();
            let res = await axios.post("/update-event",{title:eventTitle,date:eventDate,time:eventTime,location:eventLocation,description:eventDetails,id:updateID})
            hideLoader();

            if(res.status===200 && res.data===1){
                successToast('Event Updated Successfully!');
                $("#updateForm").trigger("reset");
                await getList();
            }
            else{
                errorToast("Request fail !");
            }
        }

    });

</script>
