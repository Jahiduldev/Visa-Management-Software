function fnFormatDetails ( oTable, nTr )
{
    var aData = oTable.fnGetData( nTr );
   
    var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
    sOut += '<tr><td>Rank:</td><td>'+aData[3]+'</td></tr>';
    sOut += '<tr><td>Army Name:</td><td>'+aData[4]+'</td></tr>';
    sOut += '<tr><td>Course:</td><td>'+aData[5]+'</td></tr>';
    sOut += '<tr><td>Commission Date:</td><td>'+aData[6]+'</td></tr>';
    sOut += '<tr><td>Contact No:</td><td>'+aData[7]+'</td></tr>';
    sOut += '<tr><td>Docus Received:</td><td>'+aData[8]+'</td></tr>';
    sOut += '<tr><td>Required Amount:</td><td>'+aData[9]+'</td></tr>';
    sOut += '<tr><td>Amount Received:</td><td>'+aData[10]+'</td></tr>';
    sOut += '<tr><td>Amount Due:</td><td>'+aData[11]+'</td></tr>';
    sOut += '<tr><td>Interest:</td><td>'+aData[12]+'</td></tr>';
    sOut += '<tr><td>Group No:</td><td>'+aData[13]+'</td></tr>';
    sOut += '<tr><td>Email:</td><td>'+aData[14]+'</td></tr>';
    sOut += '<tr><td>Name Of Nock:</td><td>'+aData[15]+'</td></tr>';
    sOut += '<tr><td>Unmsn:</td><td>'+aData[16]+'</td></tr>';
    sOut += '<tr><td>Plot Info:</td><td>'+aData[17]+'</td></tr>';
    sOut += '<tr><td>Remark:</td><td>'+aData[18]+'</td></tr>';
    sOut += '<tr><td>Image:</td><td>'+aData[21]+'</td></tr>';
    
    
    
    
    sOut += '</table>';

    return sOut;
}

$(document).ready(function() {

    $('#dynamic-table').dataTable( {
        "aaSorting": [[ 4, "desc" ]]
    } );

    /*
     * Insert a 'details' column to the table
     */
    var nCloneTh = document.createElement( 'th' );
    var nCloneTd = document.createElement( 'td' );
    nCloneTd.innerHTML = '<img src="http://localhost/maxis_digital/public/img/details_open.png">';
    nCloneTd.className = "center";

    $('#hidden-table-info thead tr').each( function () {
        this.insertBefore( nCloneTh, this.childNodes[0] );
    } );

    $('#hidden-table-info tbody tr').each( function () {
        this.insertBefore(  nCloneTd.cloneNode( true ), this.childNodes[0] );
    } );

    /*
     * Initialse DataTables, with no sorting on the 'details' column
     */
    var oTable = $('#hidden-table-info').dataTable( {
        "aoColumnDefs": [
        {
            "bSortable": false,
            "aTargets": [ 0 ]
        },
        // { "sClass": 'hide_coloum', "aTargets": [ 0 ] },
        // {  "aTargets": [ 6 ], "bVisible": false }
          
        ],
        "aaSorting": [[20, 'desc']]
    });

    /* Add event listener for opening and closing details
     * Note that the indicator for showing which row is open is not controlled by DataTables,
     * rather it is done here
     */
    $(document).on('click','#hidden-table-info tbody td img',function () {
        var nTr = $(this).parents('tr')[0];
        if ( oTable.fnIsOpen(nTr) )
        {
            /* This row is already open - close it */
            this.src = "http://localhost/maxis_digital/public/img/details_open.png";
            oTable.fnClose( nTr );
        }
        else
        {
            /* Open this row */
            this.src = "http://localhost/maxis_digital/public/img/details_close.png";
            oTable.fnOpen( nTr, fnFormatDetails(oTable, nTr), 'details' );
        }
    } );
} );