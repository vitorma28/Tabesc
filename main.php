<?php 
if (!isset($_FILES['file']) && !isset($_POST['new'])) {
    header("location: index.php");
    exit;
}

if (isset($_POST['send'])) {
    $filename = $_FILES['file']['name'];
    $ext = explode('.', $filename);

    $ext2 = $ext[count($ext) - 1];

    if ($ext2 != 'json') {
        header("location: index.php?e=1");
        exit;
    }

    $handler = fopen($_FILES['file']['tmp_name'], 'r');
    $content = fread($handler, filesize($_FILES['file']['tmp_name']));
    fclose($handler);
}
else {
    $filename = "table.json";
    $content = "{\"data\": {\"month\": \"JANEIRO\"}, \"persons\": [{\"name\": \"Perfil\", \"workload\": 0, \"days\": [\"\", \"\", \"\", \"\", \"\", \"\", \"\", \"\", \"\", \"\", \"\", \"\", \"\", \"\", \"\", \"\", \"\", \"\", \"\", \"\", \"\", \"\", \"\", \"\", \"\", \"\", \"\", \"\", \"\", \"\", \"\"], \"hoursworked\": 0}]}";
}

$scale = json_decode($content);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabesc</title>
    <style>
        @media (max-width: 379px) {
            #title {
                display: none !important;
            }
        }

        * {
            margin: 0;
        }

        html, body {
            height: 100%;
            background-color: #E8F1F2;
        }

        main {
            height: calc(95% - 20px);
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        table {
            border: 1px solid black;
        }

        header {
            height: 5%;
            background-color: #13293D;
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            align-items: center;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        header > h2 {
            color: #1B98E0;
        }

        textarea {
            text-align: center;
            resize: none;
            width: 90%;
            max-height: 3vh;
            border: 0;
            background-color: rgba(0, 0, 0, 0);
        }
        
        td {
            padding: 3px;
            text-align: center;
            border: 1px solid black;
            min-width: 2.5vw;
            min-height: 2.5vh;
            font-size: large;
        }

        textarea {
            font-size: larger;
            word-wrap: normal;
            overflow-x: scroll;
            overflow-y: hidden;
        }

        .d1, .d7 {
            background-color: darkgray;
        }

        .hidden {
            display: none;
        }

        .visible {
            display: block;
        }

        #table {
            border-radius: 10px;
            padding: 3px;
            overflow: scroll;
            width: 90vw;
            height: 60%;
            border: 1px solid black;
            background-color: aliceblue;
        }

        #profile_extend {
            position: absolute;
            top: calc(50vh - 52px);
            left: calc(50vw - 157px);
            background-color: aliceblue;
            border: 1px solid #13293D;
            border-radius: 5px;
            padding: 10px;
        }
    </style>
</head>
<body>
    <header>
        <h2 id="title">Tabesc</h2>
        <nav>
            <button onclick="toggleProfile()">Perfil</button>
            <button onclick="removeAllDays()">Remover dias</button>
        </nav>
        <div style="display: flex; flex-direction: row;">
            <form action="index.php">
                <input type="submit" value="Abrir arquivo">
            </form>
            <button onclick="toDownload()">Salvar</button>
            <form action="save.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="jsontable" id="jsontable" value="">
                <input type="hidden" name="filename" value="<?php echo $filename; ?>">
                <input type="submit" value="Download">
            </form>
        </div>
    </header>
    <main>
        <div id="table">
            <table>
                <thead>
                    <tr>
                        <td class="td"><select id="month" value="<?php echo $scale->data->month; ?>">
                            <option value="JANEIRO" <?php if ($scale->data->month == "JANEIRO") {echo "selected";} ?>>JANEIRO</option>
                            <option value="FEVEREIRO" <?php if ($scale->data->month == "FEVEREIRO") {echo "selected";} ?>>FEVEREIRO</option>
                            <option value="MARÇO" <?php if ($scale->data->month == "MARÇO") {echo "selected";} ?>>MARÇO</option>
                            <option value="ABRIL" <?php if ($scale->data->month == "ABRIL") {echo "selected";} ?>>ABRIL</option>
                            <option value="MAIO" <?php if ($scale->data->month == "MAIO") {echo "selected";} ?>>MAIO</option>
                            <option value="JUNHO" <?php if ($scale->data->month == "JUNHO") {echo "selected";} ?>>JUNHO</option>
                            <option value="JULHO" <?php if ($scale->data->month == "JULHO") {echo "selected";} ?>>JULHO</option>
                            <option value="AGOSTO" <?php if ($scale->data->month == "AGOSTO") {echo "selected";} ?>>AGOSTO</option>
                            <option value="SETEMBRO" <?php if ($scale->data->month == "SETEMBRO") {echo "selected";} ?>>SETEMBRO</option>
                            <option value="OUTUBRO" <?php if ($scale->data->month == "OUTUBRO") {echo "selected";} ?>>OUTUBRO</option>
                            <option value="NOVEMBRO" <?php if ($scale->data->month == "NOVEMBRO") {echo "selected";} ?>>NOVEMBRO</option>
                            <option value="DEZEMBRO" <?php if ($scale->data->month == "DEZEMBRO") {echo "selected";} ?>>DEZEMBRO</option>
                        </select></td>
                    </tr>
                    <tr>
                        <td>Nome</td>
                        <td>Carga<br>Horária</td>
                        <td>_1</td>
                        <td>_2</td>
                        <td>_3</td>
                        <td>_4</td>
                        <td>_5</td>
                        <td>_6</td>
                        <td>_7</td>
                        <td>_8</td>
                        <td>_9</td>
                        <td>10</td>
                        <td>11</td>
                        <td>12</td>
                        <td>13</td>
                        <td>14</td>
                        <td>15</td>
                        <td>16</td>
                        <td>17</td>
                        <td>18</td>
                        <td>19</td>
                        <td>20</td>
                        <td>21</td>
                        <td>22</td>
                        <td>23</td>
                        <td>24</td>
                        <td>25</td>
                        <td>26</td>
                        <td>27</td>
                        <td>28</td>
                        <td>29</td>
                        <td>30</td>
                        <td>31</td>
                        <td>Horas<br>Trabalhadas</td>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    for ($i = 0; $i < count($scale->persons, 0); $i++) {
                        $pname = $scale->persons[$i]->name;
                        $pworkload = $scale->persons[$i]->workload;
                        $phoursworked = $scale->persons[$i]->hoursworked;

                        $personp1 = <<< PERFIL1
                        <tr class="person">
                            <td><textarea class="name">$pname</textarea></td>
                            <td><textarea class="workload">$pworkload</textarea></td>
                        PERFIL1;

                        $days = "<td><textarea class=\"day\">";
                        for ($j = 0; $j < count($scale->persons[$i]->days); $j++) {
                            $days = $days.$scale->persons[$i]->days[$j]."</textarea></td>\n";
                            if ($j < count($scale->persons[$i]->days) - 1) {
                                $days = $days."<td><textarea class=\"day\">";
                            }
                        }

                        $personp3 = <<< PERFIL3
                            <td class="hoursworked">$phoursworked</td>
                        </tr>
                        PERFIL3;
                        
                        echo $personp1.$days.$personp3;
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td></td>
                        <td>MT's</td>
                        <?php 
                        $qtdMTs = 31;
                        for ($k = 1; $k <= $qtdMTs; $k++) {
                            $howmany = <<< MTS
                            <td id="mt$k"></td>

                            MTS;
                            echo $howmany;
                        }
                        ?>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>N's</td>
                        <?php 
                        $qtdNs = 31;
                        for ($l = 1; $l <= $qtdNs; $l++) {
                            $howmanyN = <<< NS
                            <td id="n$l"></td>

                            NS;
                            echo $howmanyN;
                        }
                        ?>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </main>
    <aside id="profile_extend" class="hidden">
        Criar novo perfil: <br>
        <div class="form" id="newprofile">
            <input type="text" id="cname" placeholder="Nome">
            <button onclick="createProfile()">Criar</button>
        </div>
        Deletar Perfil:
        <div class="form" id="removeprofile">
            <input type="text" id="rname" placeholder="Nome">
            <button onclick="removeProfile()">Remover</button>
        </div>
    </aside>

    <script defer>
var jsonnow = <?php echo $content; ?>

function getAll() {
    let jsonafter = {
        data: {
            month: document.getElementById('month').value
        },
        persons: []
    }
    let persons = document.getElementsByClassName('person')
    if (persons.length != 0) {
        let count = 0
        for (let p of persons) {
            let hoursworked = 0
            jsonafter.persons[count] = {
                name: p.getElementsByClassName('name')[0].value,
                workload: p.getElementsByClassName('workload')[0].value,
                days: [],
                hoursworked: p.getElementsByClassName('hoursworked')[0].innerHTML
            }
            /**
             * @type {HTMLTextAreaElement[]} days 
             */
            let days = p.getElementsByClassName('day')
            let daymonth = 1
            for (const d of days) {
                let date = new Date()
                let month
                switch (jsonafter.data.month) {
                    case "JANEIRO":
                        month = 0
                        break
                    case "FEVEREIRO":
                        month = 1
                        break
                    case "MARÇO":
                        month = 2
                        break
                    case "ABRIL":
                        month = 3
                        break
                    case "MAIO":
                        month = 4
                        break
                    case "JUNHO":
                        month = 5
                        break
                    case "JULHO":
                        month = 6
                        break
                    case "AGOSTO":
                        month = 7
                        break
                    case "SETEMBRO":
                        month = 8
                        break
                    case "OUTUBRO":
                        month = 9
                        break
                    case "NOVEMBRO":
                        month = 10
                        break
                    case "DEZEMBRO":
                        month = 11
                        break
                
                    default:
                        throw new Error('Invalid value for "month"')
                }
                date.setDate(daymonth)
                date.setMonth(month)
                d.className = ''
                d.classList.add('day')
                d.classList.add(`d${date.getDay() + 1}`)
                d.classList.add(`dm${daymonth}`)
                jsonafter.persons[count].days.push(d.value)
                if (d.value.trim() == 'M') hoursworked += 6
                else if (d.value.trim() == 'T') hoursworked += 6
                else if (d.value.trim() == 'MT') hoursworked += 12
                else if (d.value.trim() == 'N') hoursworked += 12
                daymonth++
            }
            jsonafter.persons[count].hoursworked = hoursworked
            p.getElementsByClassName('hoursworked')[0].innerHTML = hoursworked
            count++
        }
    }
    return jsonafter
}

function removeAllDays() {
    let jsonafter = {
        data: {
            month: document.getElementById('month').value
        },
        persons: []
    }
    let persons = document.getElementsByClassName('person')
    if (persons.length != 0) {
        let count = 0
        for (let p of persons) {
            jsonafter.persons[count] = {
                name: p.getElementsByClassName('name')[0].value,
                workload: p.getElementsByClassName('workload')[0].value,
                days: [],
                hoursworked: p.getElementsByClassName('hoursworked')[0].innerHTML
            }
            /**
             * @type {HTMLTextAreaElement[]} days 
             */
            let days = p.getElementsByClassName('day')
            let daymonth = 1
            for (const d of days) {
                let date = new Date()
                let month
                switch (jsonafter.data.month) {
                    case "JANEIRO":
                        month = 0
                        break
                    case "FEVEREIRO":
                        month = 1
                        break
                    case "MARÇO":
                        month = 2
                        break
                    case "ABRIL":
                        month = 3
                        break
                    case "MAIO":
                        month = 4
                        break
                    case "JUNHO":
                        month = 5
                        break
                    case "JULHO":
                        month = 6
                        break
                    case "AGOSTO":
                        month = 7
                        break
                    case "SETEMBRO":
                        month = 8
                        break
                    case "OUTUBRO":
                        month = 9
                        break
                    case "NOVEMBRO":
                        month = 10
                        break
                    case "DEZEMBRO":
                        month = 11
                        break
                
                    default:
                        throw new Error('Invalid value for "month"')
                }
                date.setDate(daymonth)
                date.setMonth(month)
                d.value = ''
                daymonth++
            }
            count++
        }
    }
}

function calcMTsNs() {
    for (let daym = 1; daym <= 31; daym++) {
        let addmt = 0, addn = 0
        let profiles = document.getElementsByClassName('dm' + daym)
        for (const d of profiles) {
            if (d.value.toLowerCase().trim() == 'mt') {
                addmt++
            }
            else if (d.value.toLowerCase().trim() == 'n') {
                addn++
            }
        }
        document.getElementById(`mt${daym}`).innerHTML = addmt
        document.getElementById(`n${daym}`).innerHTML = addn
    }
}

function toDownload() {
    calcMTsNs()
    document.getElementById('jsontable').value = JSON.stringify(getAll())
}

function toggleProfile() {
    document.getElementById('profile_extend').classList.toggle('visible')
    document.getElementById('profile_extend').classList.toggle('hidden')
}

function createProfile() {
    let tbody = document.getElementsByTagName('tbody')[0]

    let tr = document.createElement('tr')

    let name = document.createElement('td')
    let namedefault = document.createElement('textarea')
    namedefault.appendChild(document.createTextNode(document.getElementById('cname').value))
    name.appendChild(namedefault)

    let workload = document.createElement('td')
    workload.appendChild(document.createElement('textarea'))
    
    let hoursworked = document.createElement('td')
    hoursworked.appendChild(document.createTextNode('0'))

    tr.appendChild(name)
    tr.appendChild(workload)

    for (let i = 0; i < 31; i++) {
        let day = document.createElement('td')
        day.appendChild(document.createElement('textarea'))
        tr.appendChild(day)
    }

    tr.appendChild(hoursworked)

    tbody.appendChild(tr)
    document.getElementById('cname').value = ''
    toDownload()
    toggleProfile()
}

function removeProfile() {
    let index = 0
    for (const p in document.getElementsByClassName('person')) {
        if (document.getElementsByClassName('person')[p].children.item(0).children.item(0).value.toString().toLowerCase().trim() == document.getElementById('rname').value.toString().toLowerCase().trim()) {
            document.getElementsByClassName('person')[p].remove()
            break
        }
    }

    document.getElementById('rname').value = ''
    toDownload()
    toggleProfile()
}

toDownload()
toDownload()

    </script>
</body>
</html>