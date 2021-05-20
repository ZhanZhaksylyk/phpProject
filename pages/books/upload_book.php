<div class="d-flex flex-column">
    <div id="hidden">
        <form class="d-flex border bg-white p-3 m-3" onsubmit="uploadBook(event)">
            <div class="mr-4 mt-2 ml-3">
                <input type="file" name="image" />
                <div class="mt-3">
                    <button type="submit">Submit </button>
                </div>
            </div>
            <div class="w-100 mt-2 ml-1">
                <input class="border p-2 mb-2 w-100" name="author" placeholder="Author" />
                <input class="border p-2 mb-2 w-100" name="title" placeholder="Title" />
                <textarea class="border w-100 p-2" name="description">Book description</textarea>
            </div>
        </form>
    </div>
    <div class="add_box cursor-pointer my-3" onclick="addBook()">+</div>
</div>
<script>
    function addBook() {
        let doc = document.getElementById('hidden');
        if (doc.classList.contains('shown')) {
            doc.classList.remove('shown')
        } else {
            doc.classList.add('shown');
        }
        let button = document.getElementsByClassName('add_box')[0]
        if (button.innerHTML == '+') {
            button.innerHTML = '-'
        } else {
            button.innerHTML = '+'
        }
    }

    function uploadBook(event) {
        event.preventDefault();
        let inputs = event.target.elements;
        let data = {
            title: inputs.title.value,
            author: inputs.author.value,
            description: inputs.description.value,
            image: inputs.image.files[0].name
        };
        var fReader = new FileReader();
        fReader.readAsDataURL(inputs.image.files[0]);
        fReader.onloadend = function(event) {
            data.image=event.target.result;
            $.ajax({
                type: "POST",
                url: '/phpProject/functions/uploadBook.php',
                data: {
                    action: 'upload',
                    data
                },
                success: function(html) {
                    location.reload();
                }
            });
            return 0;
        }
    }
</script>
<style>
    #hidden {
        max-height: 0;
        transition: .3s;
        overflow: hidden;
    }

    .add_box {
        width: 200px;
        height: 100px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 50px;
        color: darkgrey;
        border: 1px solid lightgrey;
        align-self: center;
        background: #fff;
    }

    .add_box:hover {
        color: black;
    }

    .shown {
        max-height: 500px !important;
    }
</style>