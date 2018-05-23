<script type="text/javascript">
        $(document).ready(function(argument) {
            $('#summernote').summernote({
                height: '200px',
                placeholder:'Content here....',
                fontNames:['Arial','Arial Black','Khmer OS'],
            })
        })
        $('#clear').on('click',function() {
        $('#summernote').summernote('code',null);           
        })

    </script>
