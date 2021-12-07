$(document).ready(function(){
    $("#selection").change(function(){
        var selectedselection = $(this).children("option:selected").val();

        if (selectedselection == 'All'){
            $("#secondselect").hide();
            $("#tirdselect").hide();
            $('#secondselect').append($('<option>', {
                value: 1,
                text: 'My option'
            }));
        }
        if (selectedselection == 'Names'){
            $("#secondselect").show();
            $("#secondselect").empty();
            $("#tirdselect").show();
            $("#tirdselect").empty();
            $('#secondselect').append('<option selected="selected" value="Civil Status">Civil Status</option>');
            $('#secondselect').append('<option value="Email Add">Email Add.</option>');
        }
        if (selectedselection == 'Training'){
            $("#secondselect").show();
            $("#secondselect").empty();
            $("#tirdselect").show();
            $("#tirdselect").empty();
            $('#secondselect').append('<option selected="selected" value="All">All</option>');
            $('#secondselect').append('<option value="Search Training Tittle">Search Training Tittle</option>');
            $('#secondselect').append('<option value="Level">Level</option>');
            $('#secondselect').append('<option value="District">District</option>');
        }
        if (selectedselection == 'Trainings Needed'){
            $("#secondselect").hide();
            $("#secondselect").empty();
            $("#tirdselect").hide();
            $("#tirdselect").empty();
        }
        if (selectedselection == 'Position'){
            $("#secondselect").hide();
            $("#secondselect").empty();
            $("#tirdselect").hide();
            $("#tirdselect").empty();
        }
        if (selectedselection == 'Education'){
            $("#secondselect").show();
            $("#secondselect").empty();
            $("#tirdselect").hide();
            $("#tirdselect").empty();
            $('#secondselect').append('<option selected="selected" value="Degree/Course">Degree/Course</option>');
            $('#secondselect').append('<option value="Level">Level</option>');
            $('#secondselect').append('<option value="Category">Category</option>');
            $('#secondselect').append('<option value="Subject">Subject</option>');
        }
        if (selectedselection == 'School'){
            $("#secondselect").hide();
            $("#secondselect").empty();
            $("#tirdselect").hide();
            $("#tirdselect").empty();
        }
        if (selectedselection == 'Gender'){
            $("#secondselect").show();
            $("#secondselect").empty();
            $("#tirdselect").hide();
            $("#tirdselect").empty();
            $('#secondselect').append('<option selected="selected" value="Male">Male</option>');
            $('#secondselect').append('<option value="Female">Female</option>');
            $('#secondselect').append('<option value="LGTB">LGTB</option>');
        }
        if (selectedselection == 'Length in Service'){
            $("#secondselect").show();
            $("#secondselect").empty();
            $("#tirdselect").hide();
            $("#tirdselect").empty();
            $('#secondselect').append('<option selected="selected" value"Above">Above</option>');
            $('#secondselect').append('<option value="Below">Below</option>');
        }
        if (selectedselection == 'District'){
            $("#secondselect").show();
            $("#secondselect").empty();
            $("#tirdselect").hide();
            $("#tirdselect").empty();
            $('#secondselect').append('<option selected="selected" value="Aguinaldo">Aguinaldo</option>');
            $('#secondselect').append('<option value="Alfonso Lista">Alfonso Lista</option>');
            $('#secondselect').append('<option value="Asipulo">Asipulo</option>');
            $('#secondselect').append('<option value="Banaue">Banaue</option>');
            $('#secondselect').append('<option value="Hingyon">Hingyon</option>');
            $('#secondselect').append('<option value="Hungduan">Hungduan</option>');
            $('#secondselect').append('<option value="Kiangan">Kiangan</option>');
            $('#secondselect').append('<option value="Lagawe">Lagawe</option>');
            $('#secondselect').append('<option value="Lamut">Lamut</option>');
            $('#secondselect').append('<option value="Mayoyao">Mayoyao</option>');
            $('#secondselect').append('<option value="Tinoc">Tinoc</option>');
        }
        if (selectedselection == 'Scholarship/Grant'){
            $("#secondselect").hide();
            $("#secondselect").empty();
            $("#tirdselect").hide();
            $("#tirdselect").empty();
        }
        if (selectedselection == 'Awards'){
            $("#secondselect").show();
            $("#secondselect").empty();
            $("#tirdselect").hide();
            $("#tirdselect").empty();
            $('#secondselect').append('<option selected="selected" value"Tittle">Tittle</option>');
            $('#secondselect').append('<option value="Level">Level</option>');
            $('#secondselect').append('<option value="Search">Search</option>');
        }
        if (selectedselection == 'needed'){
            $("#secondselect").hide();
            $("#secondselect").empty();
            $("#tirdselect").hide();
            $("#tirdselect").empty();
        }
        if (selectedselection == 'Classification'){
            $("#secondselect").show();
            $("#secondselect").empty();
            $("#tirdselect").hide();
            $("#tirdselect").empty();
            $('#secondselect').append('<option selected="selected" value"Teaching">Teaching</option>');
            $('#secondselect').append('<option value="Non Teaching">Non Teaching</option>');
            $('#secondselect').append('<option value="Teaching related">Teaching Related</option>');
        }
    });

    $("#secondselect").change(function(){
        var selectedsecond = $(this).children("option:selected").val();
        if(selectedsecond == 'Tittle' && $("#selection").val() == 'Awards'){
            $("#tirdselect").empty();
            $("#tirdselect").hide();
        }
        if(selectedsecond == 'Search'){
            $("#tirdselect").empty();
            $("#tirdselect").hide();
        }
        if(selectedsecond == 'Degree/Course'){
            $("#tirdselect").empty();
            $("#tirdselect").hide();
        }
        if(selectedsecond == 'Level' && $("#selection").val() == 'Awards'){
            $("#tirdselect").show();
            $("#tirdselect").empty();
            $('#tirdselect').append('<option selected="selected" value="Division">Division</option>');
            $('#tirdselect').append('<option value="Regional">Regional</option>');
            $('#tirdselect').append('<option value="National">National</option>');
            $('#tirdselect').append('<option value="International">International</option>');
            }
        if(selectedsecond == 'Level' && $("#selection").val() == 'Education'){
            $("#tirdselect").show();
            $("#tirdselect").empty();
            $('#tirdselect').append('<option selected="selected" value="Vocational">Vocational</option>');
            $('#tirdselect').append('<option value="College">College</option>');
            $('#tirdselect').append('<option value="Masteral">Masteral</option>');
            $('#tirdselect').append('<option value="Doctoral">Doctoral</option>');
            }
        if(selectedsecond == 'Category'){
            $("#tirdselect").empty();
            $("#tirdselect").show();
            $('#tirdselect').append('<option selected="selected" value="Minor">Minor</option>');
            $('#tirdselect').append('<option value="Major">Major</option>');
            $('#tirdselect').append('<option value="Masteral">Masteral</option>');
            $('#tirdselect').append('<option value="Doctoral">Doctoral</option>');
        }
        if(selectedsecond == 'District' && $("#selection").val() == 'Training'){
            $("#tirdselect").empty();
            $("#tirdselect").show();
            $('#tirdselect').append('<option selected="selected" value="Aguinaldo">Aguinaldo</option>');
            $('#tirdselect').append('<option value="Alfonso Lista">Alfonso Lista</option>');
            $('#tirdselect').append('<option value="Asipulo">Asipulo</option>');
            $('#tirdselect').append('<option value="Banaue">Banaue</option>');
            $('#tirdselect').append('<option value="Hingyon">Hingyon</option>');
            $('#tirdselect').append('<option value="Hungduan">Hungduan</option>');
            $('#tirdselect').append('<option value="Kiangan">Kiangan</option>');
            $('#tirdselect').append('<option value="Lagawe">Lagawe</option>');
            $('#tirdselect').append('<option value="Lamut">Lamut</option>');
            $('#tirdselect').append('<option value="Mayoyao">Mayoyao</option>');
            $('#tirdselect').append('<option value="Tinoc">Tinoc</option>');
        }
        if(selectedsecond == 'Subject'){
            $("#tirdselect").empty();
            $("#tirdselect").hide();
        }
        if(selectedsecond == 'Civil Status'){
        $("#tirdselect").show();
        $("#tirdselect").empty();
        $('#tirdselect').append('<option selected="selected" value="MALE">MALE</option>');
        $('#tirdselect').append('<option value="FEMALE">FEMALE</option>');
        $('#tirdselect').append('<option value="LGBT">LGBT</option>');
        }
        if(selectedsecond == 'Email Add'){
            $("#tirdselect").empty();
            $("#tirdselect").hide();
        }
        if(selectedsecond == 'Level' && $("#selection").val() == 'Training'){
            $("#tirdselect").show();
            $("#tirdselect").empty();
            $('#tirdselect').append('<option selected="selected" value="Division">Division</option>');
            $('#tirdselect').append('<option value="Regional">Regional</option>');
            $('#tirdselect').append('<option value="National">National</option>');
            $('#tirdselect').append('<option value="International">International</option>');
            }
        if(selectedsecond == 'All' && $("#selection").val() == 'Training'){
                $("#tirdselect").empty();
                $("#tirdselect").hide();
        }
        if(selectedsecond == 'Search Training Tittle' && $("#selection").val() == 'Training'){
            $("#tirdselect").empty();
            $("#tirdselect").hide();
        }

    });
});