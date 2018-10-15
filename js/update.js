function updateCustom(reportId) {
    var temp = $("#test_name").val();
    if (temp == 1)
        updateBloodexam(reportId);
    else if (temp == 2)
        updateUrineexam(reportId);
    else if (temp == 3)
        updateBloodbank(reportId);
    else if (temp == 4)
        updateBiochemistry(reportId);
    else if (temp == 5)
        updateSerumElectro(reportId);
    else if (temp == 6)
        updateSerology(reportId);
    else if (temp == 7)
        updateCSFanalysis(reportId);
    else if (temp == 8)
        updateSemenAnalysis(reportId);
    else if (temp == 9)
        updateStoolexam(reportId);
    else if (temp == 10)
        updateAdalevel(reportId);
    else if (temp == 11)
        updateCholinesterase(reportId);
    else if (temp == 12)
        updatePlasmafib(reportId);
    else if (temp == 13)
        updateGlucosetol(reportId);
}

function updateBloodexam(reportId) {
    var haemoglobin = $("#haemoglobin").val();
    var total_WBC_count = $("#total_WBC_count").val();
    var neutrophils = $("#neutrophils").val();
    var lymphocytes = $("#lymphocytes").val();
    var eosinophils = $("#eosinophils").val();
    var monocytese = $("#monocytese").val();
    var basophils = $("#basophils").val();
    var ESR = $("#ESR").val();
    var AEC = $("#AEC").val();
    var platelet_count = $("#platelet_count").val();
    var reticulocyte_count = $("#reticulocyte_count").val();
    var haematocrit_PCV = $("#haematocrit_PCV").val();
    var bleeding_time = $("#bleeding_time").val();
    var clotting_time = $("#clotting_time").val();
    var MCV = $("#MCV").val();
    var MCH = $("#MCH").val();
    var MCHC = $("#MCHC").val();
    var colour_index = $("#colour_index").val();
    var smear_for_MP = $("#smear_for_MP").val();
    var smear_for_MF = $("#smear_for_MF").val();
    var LE_cell_phenomenon = $("#LE_cell_phenomenon").val();
    var sickle_cell_test = $("#sickle_cell_test").val();

    var dataStr = 'reportId=' + reportId + '&haemoglobin=' + haemoglobin + '&total_WBC_count=' + total_WBC_count + '&neutrophils=' + neutrophils + '&lymphocytes=' + lymphocytes + '&eosinophils=' + eosinophils + '&monocytese=' + monocytese + '&basophils=' + basophils + '&ESR=' + ESR + '&AEC=' + AEC + '&platelet_count=' + platelet_count + '&reticulocyte_count=' + reticulocyte_count + '&haematocrit_PCV=' + haematocrit_PCV + '&bleeding_time=' + bleeding_time + '&clotting_time=' + clotting_time + '&MCV=' + MCV + '&MCH=' + MCH + '&MCHC=' + MCHC + '&colour_index=' + colour_index + '&smear_for_MP=' + smear_for_MP + '&smear_for_MF=' + smear_for_MF + '&LE_cell_phenomenon=' + LE_cell_phenomenon + '&sickle_cell_test=' + sickle_cell_test;
    var data = returnAjax('GET', "class/updatebloodexam.class.php", dataStr);
    showError('1', '1', data);
}

function updateUrineexam(reportId) {
    var albumin = $("#albumin").val();
    var phosphates = $("#phosphates").val();
    var sugar_fasting = $("#sugar_fasting").val();
    var sugar_PP = $("#sugar_PP").val();
    var sugar_random = $("#sugar_random").val();
    var WBC_puss_cells = $("#WBC_puss_cells").val();
    var RBC = $("#RBC").val();
    var epithelial_cells = $("#epithelial_cells").val();
    var CASTS = $("#CASTS").val();
    var CRYSTALS = $("#CRYSTALS").val();
    var colour = $("#colour").val();
    var appearance = $("#appearance").val();
    var sediment = $("#sediment").val();
    var ph_reaction = $("#ph_reaction").val();
    var specific_gravity = $("#specific_gravity").val();
    var bile_salts = $("#bile_salts").val();
    var bile_pigments = $("#bile_pigments").val();
    var urobilinogen = $("#urobilinogen").val();
    var KETONE = $("#KETONE").val();
    var NITRITE = $("#NITRITE").val();
    var ketone_bodies_acetone = $("#ketone_bodies_acetone").val();
    var chyle = $("#chyle").val();
    var bence_zence_protein = $("#bence_zence_protein").val();
    var occult_blood = $("#occult_blood").val();
    var pregnancy_test = $("#pregnancy_test").val();
    var dataStr = 'reportId=' + reportId + '&albumin=' + albumin + '&phosphates=' + phosphates + '&sugar_fasting=' + sugar_fasting + '&sugar_PP=' + sugar_PP + '&sugar_random=' + sugar_random + '&WBC_puss_cells=' + WBC_puss_cells + '&RBC=' + RBC + '&epithelial_cells=' + epithelial_cells + '&CASTS=' + CASTS + '&CRYSTALS=' + CRYSTALS + '&colour=' + colour + '&appearance=' + appearance + '&sediment=' + sediment + '&ph_reaction=' + ph_reaction + '&specific_gravity=' + specific_gravity + '&bile_salts=' + bile_salts + '&bile_pigments=' + bile_pigments + '&urobilinogen=' + urobilinogen + '&KETONE=' + KETONE + '&NITRITE=' + NITRITE + '&ketone_bodies_acetone=' + ketone_bodies_acetone + '&chyle=' + chyle + '&bence_zence_protein=' + bence_zence_protein + '&occult_blood=' + occult_blood + '&pregnancy_test=' + pregnancy_test;
    var data = returnAjax('GET', "class/updateurineexam.class.php", dataStr);
    showError('1', '1', data);
}

function updateBloodbank(reportId) {
    var blood_group = $("#blood_group").val();
    var rh_typing = $("#rh_typing").val();
    var dataStr = 'reportId=' + reportId + '&blood_group=' + blood_group + '&rh_typing=' + rh_typing;
    var data = returnAjax('POST', "class/updatebloodbank.class.php", dataStr);
    showError('1', '1', data);
}

function updateBiochemistry(reportId) {
    var sugar_fasting = $("#sugar_fasting").val();
    var sugar_pp = $("#sugar_pp").val();
    var sugar_random = $("#sugar_random").val();
    var urea = $("#urea").val();
    var s_creatinine = $("#s_creatinine").val();
    var total_cholestrol = $("#total_cholestrol").val();
    var HDL_cholestrol = $("#HDL_cholestrol").val();
    var VLDL_cholestrol = $("#VLDL_cholestrol").val();
    var LDL = $("#LDL").val();
    var triglycerides = $("#triglycerides").val();
    var vanden_berghs_reaction = $("#vanden_berghs_reaction").val();
    var total_bilirubin = $("#total_bilirubin").val();
    var direct_bilirubin = $("#direct_bilirubin").val();
    var indirect_bilirubin = $("#indirect_bilirubin").val();
    var SGPT = $("#SGPT").val();
    var SGOT = $("#SGOT").val();
    var alkaline_phosphatase = $("#alkaline_phosphatase").val();
    var ACID_phosphatase = $("#ACID_phosphatase").val();
    var ACID_phosphatase_prostatic = $("#ACID_phosphatase_prostatic").val();
    var total_protein = $("#total_protein").val();
    var albumin = $("#albumin").val();
    var globulin = $("#globulin").val();
    var AG_ratio = $("#AG_ratio").val();
    var calcium = $("#calcium").val();
    var phosphorous = $("#phosphorous").val();
    var cric_acid = $("#cric_acid").val();
    var serum_amylase = $("#serum_amylase").val();
    var fibrinogen = $("#fibrinogen").val();
    var prothrombin_test = $("#prothrombin_test").val();
    var prothrombin_control = $("#prothrombin_control").val();
    var prothrombin_index = $("#prothrombin_index").val();
    var prothrombin_ratio = $("#prothrombin_ratio").val();

    var dataStr = 'reportId=' + reportId + '&sugar_fasting=' + sugar_fasting + '&sugar_pp=' + sugar_pp + '&sugar_random=' + sugar_random + '&urea=' + urea + '&s_creatinine=' + s_creatinine + '&total_cholestrol=' + total_cholestrol + '&HDL_cholestrol=' + HDL_cholestrol + '&VLDL_cholestrol=' + VLDL_cholestrol + '&LDL=' + LDL + '&triglycerides=' + triglycerides + '&vanden_berghs_reaction=' + vanden_berghs_reaction + '&total_bilirubin=' + total_bilirubin + '&direct_bilirubin=' + direct_bilirubin + '&direct_bilirubin=' + direct_bilirubin + '&indirect_bilirubin=' + indirect_bilirubin + '&SGPT=' + SGPT + '&SGOT=' + SGOT + '&alkaline_phosphatase=' + alkaline_phosphatase + '&ACID_phosphatase=' + ACID_phosphatase + '&ACID_phosphatase_prostatic=' + ACID_phosphatase_prostatic + '&total_protein=' + total_protein + '&albumin=' + albumin + '&globulin=' + globulin + '&AG_ratio=' + AG_ratio + '&calcium=' + calcium + '&phosphorous=' + phosphorous + '&cric_acid=' + cric_acid + '&serum_amylase=' + serum_amylase + '&fibrinogen=' + fibrinogen + '&prothrombin_test=' + prothrombin_test + '&prothrombin_control=' + prothrombin_control + '&prothrombin_index=' + prothrombin_index + '&prothrombin_ratio=' + prothrombin_ratio;
    var data = returnAjax('GET', "class/updatebiochemistry.class.php", dataStr);
    showError('1', '1', data);
}

function updateSerumElectro(reportId) {
    var sodium_Na = $("#sodium_Na").val();
    var potassium_K = $("#potassium_K").val();
    var chlorides = $("#chlorides").val();
    var calcium = $("#calcium").val();
    var dataStr = 'reportId=' + reportId + '&sodium_Na=' + sodium_Na + '&potassium_K=' + potassium_K + '&chlorides=' + chlorides + '&calcium=' + calcium;
    var data = returnAjax('GET', "class/updateserumelectro.class.php", dataStr);
    showError('1', '1', data);
}

function updateSerology(reportId) {
    var VDRL = $("#VDRL").val();
    var TPHA = $("#TPHA").val();
    var hepatitisB_hbs_Ag = $("#hepatitisB_hbs_Ag").val();
    var HIV = $("#HIV").val();
    var hepatitisC = $("#hepatitisC").val();
    var ra_factor = $("#ra_factor").val();
    var ASO_test = $("#ASO_test").val();
    var CRP = $("#CRP").val();
    var mantoux_test = $("#mantoux_test").val();
    var sputum_for_AFB = $("#sputum_for_AFB").val();
    var salmonella_typhi_o = $("#salmonella_typhi_o").val();
    var salmonella_typhi_H = $("#salmonella_typhi_H").val();
    var salmonella_typhi_AH = $("#salmonella_typhi_AH").val();
    var salmonella_typhi_BH = $("#salmonella_typhi_BH").val();

    var dataStr = 'reportId=' + reportId + '&VDRL=' + VDRL + '&TPHA=' + TPHA + '&hepatitisB_hbs_Ag=' + hepatitisB_hbs_Ag + '&HIV=' + HIV + '&hepatitisC=' + hepatitisC + '&ra_factor=' + ra_factor + '&ASO_test=' + ASO_test + '&CRP=' + CRP + '&mantoux_test=' + mantoux_test + '&sputum_for_AFB=' + sputum_for_AFB + '&salmonella_typhi_o=' + salmonella_typhi_o + '&salmonella_typhi_H=' + salmonella_typhi_H + '&salmonella_typhi_AH=' + salmonella_typhi_AH + '&salmonella_typhi_BH=' + salmonella_typhi_BH;
    var data = returnAjax('GET', "class/updateserology.class.php", dataStr);
    showError('1', '1', data);
}

function updateCSFanalysis(reportId) {
    var cell_cunt = $("#cell_cunt").val();
    var type_of_cells = $("#type_of_cells").val();
    var pandy_test = $("#pandy_test").val();
    var globulin = $("#globulin").val();
    var total_protein = $("#total_protein").val();
    var sugar = $("#sugar").val();
    var chlorides = $("#chlorides").val();
    var dataStr = 'reportId=' + reportId + '&cell_cunt=' + cell_cunt + '&type_of_cells=' + type_of_cells + '&pandy_test=' + pandy_test + '&globulin=' + globulin + '&total_protein=' + total_protein + '&sugar=' + sugar + '&chlorides=' + chlorides;
    var data = returnAjax('GET', "class/updatecsfanalysis.class.php", dataStr);
    showError('1', '1', data);
}

function updateSemenAnalysis(reportId) {
    var volume = $("#volume").val();
    var reaction_Ph = $("#reaction_Ph").val();
    var viscosity = $("#viscosity").val();
    var count = $("#count").val();
    var colour = $("#colour").val();
    var puss_cells = $("#puss_cells").val();
    var dataStr = 'reportId=' + reportId + '&volume=' + volume + '&reaction_Ph=' + reaction_Ph + '&viscosity=' + viscosity + '&count=' + count + '&colour=' + colour + '&puss_cells=' + puss_cells;
    var data = returnAjax('GET', "class/updatesemen.class.php", dataStr);
    showError('1', '1', data);
}

function updateStoolexam(reportId) {
    var colour = $("#colour").val();
    var consistency = $("#consistency").val();
    var mucous = $("#mucous").val();
    var Ph_reaction = $("#Ph_reaction").val();
    var reducing_substances = $("#reducing_substances").val();
    var occult_blood = $("#occult_blood").val();
    var OVA = $("#OVA").val();
    var CYSTS = $("#CYSTS").val();
    var puss_cells = $("#puss_cells").val();
    var RBC = $("#RBC").val();
    var dataStr = 'reportId=' + reportId + '&colour=' + colour + '&consistency=' + consistency + '&mucous=' + mucous + '&Ph_reaction=' + Ph_reaction + '&reducing_substances=' + reducing_substances + '&occult_blood=' + occult_blood + '&OVA=' + OVA + '&CYSTS=' + CYSTS + '&puss_cells=' + puss_cells + '&RBC=' + RBC;
    var data = returnAjax('GET', "class/updatestoolexam.class.php", dataStr);
    showError('1', '1', data);
}

function updateAdalevel(reportId) {
    var nature_specimen = $("#nature_specimen").val();
    var result = $("#result").val();
    var normal = $("#normal").val();
    var dataStr = 'reportId=' + reportId + '&nature_specimen=' + nature_specimen + '&result=' + result + '&normal=' + normal;
    var data = returnAjax('POST', "class/updateadalevels.class.php", dataStr);
    showError('1', '1', data);
}

function updateCholinesterase(reportId) {
    var cholinesterase_result = $("#cholinesterase_result").val();
    var female = $("#female").val();
    var male = $("#male").val();
    var dataStr = 'reportId=' + reportId + '&cholinesterase_result=' + cholinesterase_result + '&female=' + female + '&male=' + male;
    var data = returnAjax('POST', "class/updatecholine.class.php", dataStr);
    showError('1', '1', data);
}

function updatePlasmafib(reportId) {
    var plasma_fibrinogen = $("#plasma_fibrinogen").val();
    var normal = $("#normal").val();
    var dataStr = 'reportId=' + reportId + '&plasma_fibrinogen=' + plasma_fibrinogen + '&normal=' + normal;
    var data = returnAjax('POST', "class/updateplasma.class.php", dataStr);
    showError('1', '1', data);
}

function updateGlucosetol(reportId) {
    var fasting_glucose = $("#fasting_glucose").val();
    var hour1 = $("#hour1").val();
    var hour2 = $("#hour2").val();
    var hour3 = $("#hour3").val();
    var dataStr = 'reportId=' + reportId + '&fasting_glucose=' + fasting_glucose + '&hour1=' + hour1 + '&hour2=' + hour2 + '&hour3=' + hour3;
    var data = returnAjax('POST', "class/updateglucose.class.php", dataStr);
    showError('1', '1', data);
}