<script>



    $(document).ready(function() {
        // Setup - add a text input to each footer cell
       /* $('#example tfoot th').each( function () {
            var title = $(this).text();
            $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
        }); */

        // DataTable
        var table = $('#example').DataTable();

		
		 // Handle click on "Select all" control
        $('#chkall').on('click', function () {
            // Get all rows with search applied
            var rows = table.rows({'search': 'applied'}).nodes();
            // Check/uncheck checkboxes for all rows in the table
            $('input[type="checkbox"]', rows).prop('checked', this.checked);

        });


        // Handle click on checkbox to set state of "Select all" control
        $('#example tbody').on('change', 'input[type="checkbox"]', function () {
            // If checkbox is not checked
            if (!this.checked) {
                var el = $('#chkall').get(0);
                // If "Select all" control is checked and has 'indeterminate' property
                if (el && el.checked && ('indeterminate' in el)) {
                    // Set visual state of "Select all" control
                    // as 'indeterminate'
                    el.indeterminate = true;
                }
            }
        });

        // Handle form submission event
        $('#addCustomerForm').on('submit', function (e) {
            var form = this;
            // Iterate over all checkboxes in the table
            table.$('input[type="checkbox"]').each(function () {
                // If checkbox doesn't exist in DOM
                if (!$.contains(document, this)) {
                    // If checkbox is checked
                    if (this.checked) {
                        // Create a hidden element
                        $(form).append(
                                $('<input>')
                                .attr('type', 'hidden')
                                .attr('name', this.name)
                                .val(this.value)
                                );
                    }
                }
            });
        });
		
		
		
		
		
        // Apply the search
        table.columns().every( function () {
            var that = this;

            $( 'input', this.footer() ).on( 'keyup change', function () {
                if ( that.search() !== this.value ) {
                    that
                    .search( this.value )
                    .draw();
                }
            } );
        } );
    } );







</script>


</body>
</html>
