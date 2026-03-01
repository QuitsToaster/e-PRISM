@extends('layouts.app')

@section('title', 'Submit Research')

@section('content')
<div class="max-w-6xl mx-auto mt-10">

    <!-- HEADER -->
    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-xl p-8 shadow-lg mb-10">
        <h1 class="text-3xl font-extrabold">Submit Research</h1>
        <p class="text-indigo-100 mt-2">
            Choose what you want to submit, then complete the required fields.
        </p>
    </div>

    <!-- STEP 1 -->
    <div class="bg-white rounded-xl shadow-lg p-8 mb-8">
        <h2 class="text-xl font-bold mb-4">What would you like to submit?</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <button id="btnProposal"
                class="border-2 border-indigo-500 text-indigo-600 p-6 rounded-xl hover:bg-indigo-50 font-semibold">
                Research Proposal
            </button>

            <button id="btnCompleted"
                class="border-2 border-green-500 text-green-600 p-6 rounded-xl hover:bg-green-50 font-semibold">
                Completed Research
            </button>
        </div>
    </div>

    <!-- FORM -->
    <div id="submissionForm" class="bg-white p-8 rounded-xl shadow-lg hidden">
        <form method="POST" action="{{ route('submit.paper') }}" enctype="multipart/form-data" class="space-y-8">
            @csrf

            <input type="hidden" id="classification" name="classification">

            <!-- TYPE -->
            <div>
                <label class="font-semibold">Type of Research</label>
                <select id="researchType" name="research_type"
                        class="w-full mt-2 border p-3 rounded-lg">
                    <option selected disabled>Select type</option>
                    <option value="action">Action Research</option>
                    <option value="basic">Basic Research</option>
                </select>
            </div>

            <!-- PROPONENTS -->
            <div>
                <label class="font-semibold mb-2 block">Proponents (Max 5)</label>

                <div id="proponents" class="space-y-4"></div>

                <button type="button" id="addProponent"
                        class="mt-3 bg-indigo-600 text-white px-4 py-2 rounded-lg">
                    + Add Proponent
                </button>
            </div>

            <!-- COMMON -->
            <div class="grid md:grid-cols-2 gap-4">
                <input name="school" placeholder="School / Station" class="border p-3 rounded-lg">
                <input name="school_id" placeholder="School ID (Optional)" class="border p-3 rounded-lg">
            </div>

            <input name="title" placeholder="Title of the Study" class="border p-3 rounded-lg w-full">

            <!-- CHAPTERS -->
            <div id="chapters" class="space-y-10"></div>

            <!-- ATTACHMENTS -->
<div>
    <label class="font-semibold mb-2 block">
        Required PDF Attachments
    </label>

    <p class="text-sm text-gray-500 mb-4">
        Please upload the required documents based on your research type and status.
    </p>

    <div id="attachmentsSection" class="space-y-4"></div>
</div>

            <!-- ACTIONS -->
<input type="hidden" name="action" id="formAction" value="draft">

<div class="flex gap-4">
    <button type="submit" onclick="document.getElementById('formAction').value='draft'"
        class="bg-gray-600 text-white px-6 py-3 rounded-lg">
        Save Draft
    </button>
    <button type="submit" onclick="document.getElementById('formAction').value='submitted'"
        class="bg-green-600 text-white px-6 py-3 rounded-lg">
        Submit
    </button>
</div>
        </form>
    </div>
</div>

<script>
let proponentCount = 0;
const maxProponents = 5;

const proponentsDiv = document.getElementById('proponents');
const chaptersDiv = document.getElementById('chapters');
const researchType = document.getElementById('researchType');
const classification = document.getElementById('classification');
const form = document.getElementById('submissionForm');

/* SHOW FORM */
btnProposal.onclick = () => {
    classification.value = 'proposal';
    form.classList.remove('hidden');
    loadAttachments();
};

btnCompleted.onclick = () => {
    classification.value = 'completed';
    form.classList.remove('hidden');
    loadAttachments();
};

/* ADD PROPONENT WITH PHOTO */
addProponent.onclick = () => {
    if (proponentCount >= maxProponents) return;

    proponentsDiv.insertAdjacentHTML('beforeend', `
        <div class="border rounded-lg p-4 relative bg-gray-50">
            <div class="grid md:grid-cols-3 gap-3">
                <input name="proponents[${proponentCount}][name]"
                       placeholder="Full Name"
                       class="border p-2 rounded" required>
                <input name="proponents[${proponentCount}][position]"
                       placeholder="Position (Plantilla)"
                       class="border p-2 rounded" required>
                <input type="file"
                       name="proponents[${proponentCount}][photo]"
                       accept="image/*"
                       class="border p-2 rounded" required>
            </div>
            <button type="button"
                    onclick="this.parentElement.remove(); proponentCount--;"
                    class="absolute top-2 right-2 bg-red-500 text-white px-2 py-1 rounded text-sm">
                Remove
            </button>
        </div>
    `);

    proponentCount++;
};

/* CHAPTER DATA */
const chapterMap = {
    proposal: {
        action: [
            { title: "Chapter I. Context and Rationale" },
            { title: "Chapter II. Action Research Questions" },
            { title: "Chapter III. Proposed Innovation, Intervention, and Strategy" },
            {
                title: "Chapter IV. Action Research Methods",
                subs: [
                    "a. Participants and/or Other Sources of Data and Information",
                    "b. Data Gathering Methods",
                    "c. Ethical Considerations",
                    "d. Data Analysis Plan"
                ]
            },
            { title: "Chapter V. Action Research Work Plan and Timelines (Tabular)" },
            { title: "Chapter VI. Cost Estimates (Tabular)" },
            { title: "Chapter VII. Plans for Disseminate and Utilization" },
            { title: "Chapter VIII. References" }
        ],
        basic: [
            { title: "Chapter I. Context and Rationale" },
            { title: "Chapter II. Literature Review and Studies" },
            { title: "Chapter III. Research Questions" },
            { title: "Chapter IV. Scope and Limitation" },
            {
                title: "Chapter V. Research Methodology",
                subs: [
                    "a. Sampling Method",
                    "b. Data Collection Methods",
                    "c. Ethical Considerations",
                    "d. Plan for Data Analysis"
                ]
            },
            { title: "Chapter VI. Timetable (Tabular)" },
            { title: "Chapter VII. Cost Estimates (Tabular)" },
            { title: "Chapter VIII. Plans for Dissemination and Advocacy Plan" },
            { title: "Chapter IX. References" }
        ]
    },
    completed: {
        action: [
            { title: "Chapter I. Context and Rationale" },
            { title: "Chapter II. Action Research Questions" },
            { title: "Chapter III. Proposed Innovation, Intervention, and Strategy" },
            {
                title: "Chapter IV. Action Research Methods",
                subs: [
                    "a. Participants and/or Other Sources of Data and Information",
                    "b. Data Gathering Methods",
                    "c. Ethical Issues",
                    "d. Data Analysis Plan"
                ]
            },
            { title: "Chapter V. Discussion of Results and Reflection" },
            { title: "Conclusions" },
            { title: "Recommendations" },
            { title: "Reflection" },
            { title: "Chapter VI. Action Plan to Sustain the Utilization of the Intervention Material" },
            { title: "Chapter VII. References" },
            { title: "Chapter VIII. Financial Report (Tabular)" }
        ],
        basic: [
            { title: "Chapter I. Introduction and Rationale" },
            { title: "Chapter II. Literature Review and Studies" },
            { title: "Chapter III. Research Questions" },
            { title: "Chapter IV. Scope and Limitation" },
            {
                title: "Chapter V. Research Methodology",
                subs: [
                    "a. Sampling Method",
                    "b. Data Collection Methods",
                    "c. Ethical Considerations",
                    "d. Data Analysis Plan"
                ]
            },
            { title: "Chapter VI. Discussion of Results and Recommendations" },
            { title: "Conclusions" },
            { title: "Recommendations" },
            { title: "Reflection" },
            { title: "Chapter VII. Plans for Dissemination and Advocacy Plan" },
            { title: "Chapter VIII. References" },
            { title: "Chapter IX. Financial Report" }
        ]
    }
};

const attachmentMap = {
    proposal: {
        action: [
            'Documentation',
            'Narrative Form'
        ],
        basic: [
            'Documentation',
            'Narrative Form'
        ]
    },
    completed: {
        action: [
            'Copy of the Proposed Innovation / Intervention Material',
            'Copy of the Approved Proposal',
            'Copy of the Documentation',
            'Copy of the Implementation (Accomplishment Report / Certificate of Implementation)',
            'Copy of the Dissemination',
            'Copy of the Adoption',
            'Copy of the Utilization',
            'Copy of the Liquidation'
        ],
        basic: [
            'Copy of the Proposed Innovation / Intervention Material',
            'Copy of the Approved Proposal',
            'Copy of the Documentation',
            'Copy of the Implementation (Accomplishment Report / Certificate of Implementation)',
            'Copy of the Dissemination',
            'Copy of the Adoption',
            'Copy of the Utilization',
            'Copy of the Liquidation'
        ]
    }
};

const attachmentsSection = document.getElementById('attachmentsSection');

/* LOAD ATTACHMENTS */
function loadAttachments() {
    attachmentsSection.innerHTML = '';

    if (!classification.value || !researchType.value) return;

    const list = attachmentMap[classification.value][researchType.value];

    list.forEach((label, index) => {
        attachmentsSection.insertAdjacentHTML('beforeend', `
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    ${label} <span class="text-red-500">*</span>
                </label>
                <input 
                    type="file"
                    name="attachments[${index}]"
                    accept=".pdf"
                    required
                    class="w-full border p-2 rounded-lg"
                >
            </div>
        `);
    });
}


/* =====================================================
   TABLE FUNCTIONS
===================================================== */
function editableTable(columns, namePrefix, hasTotal = false) {
    const cols = columns.map(c => `<th class="border px-3 py-2">${c}</th>`).join('');
    return `
        <div class="table-wrapper" data-prefix="${namePrefix}">
            <table class="w-full border-collapse border mt-4">
                <thead><tr>${cols}${hasTotal ? `<th class="border px-3 py-2">Total</th>` : ''}<th></th></tr></thead>
                <tbody>${tableRow(columns, namePrefix, hasTotal, 0)}</tbody>
            </table>
            <button type="button" class="mt-2 bg-indigo-600 text-white px-4 py-2 rounded" onclick="addRow(this)">+ Add Row</button>
            ${hasTotal ? `<div class="text-right font-bold mt-2">Grand Total: <span class="grand-total">0</span></div>` : ''}
        </div>
    `;
}

function tableRow(columns, namePrefix, hasTotal, index) {
    const cells = columns.map((_, colIndex) => `
        <td class="border px-3 py-2">
            <input name="${namePrefix}[${index}][${colIndex}]" class="w-full border p-2 rounded" />
        </td>`).join('');
    return `
        <tr>
            ${cells}
            ${hasTotal ? `<td class="border px-3 py-2"><input class="row-total w-full border p-2 rounded" readonly></td>` : ''}
            <td class="border px-3 py-2 text-center">
                <button type="button" onclick="this.closest('tr').remove(); calculateTotals();" class="bg-red-500 text-white px-2 py-1 rounded">✕</button>
            </td>
        </tr>
    `;
}

function addRow(btn) {
    const wrapper = btn.closest('.table-wrapper');
    const tbody = wrapper.querySelector('tbody');
    const prefix = wrapper.dataset.prefix;
    const colCount = wrapper.querySelectorAll('thead th').length - 2; // exclude total and remove column
    const index = tbody.children.length;
    const columns = Array(colCount).fill('');
    tbody.insertAdjacentHTML('beforeend', tableRow(columns, prefix, !!wrapper.querySelector('.grand-total'), index));
}

function costEstimateTable(namePrefix) {
    return editableTable(['Activities','Item Description','Qty','Unit','Unit Cost'], namePrefix, true);
}

/* =====================================================
   AUTO TOTAL CALC
===================================================== */
function calculateTotals() {
    document.querySelectorAll('.table-wrapper').forEach(wrapper => {
        const grandTotalElem = wrapper.querySelector('.grand-total');
        if (!grandTotalElem) return;
        let grand = 0;
        wrapper.querySelectorAll('tbody tr').forEach(row => {
            const qty = parseFloat(row.querySelector('input[name*="[3]"]')?.value) || 0;
            const unit = parseFloat(row.querySelector('input[name*="[4]"]')?.value) || 0;
            const totalInput = row.querySelector('.row-total');
            if (totalInput) {
                const total = qty * unit;
                totalInput.value = total.toFixed(2);
                grand += total;
            }
        });
        grandTotalElem.innerText = grand.toFixed(2);
    });
}

document.addEventListener('input', calculateTotals);

/* =====================================================
   LOAD CHAPTERS (ONLY CHANGE IS LABEL)
===================================================== */
researchType.onchange = () => {
    chaptersDiv.innerHTML = '';
    if (!classification.value) return;

    const list = chapterMap[classification.value][researchType.value];

    list.forEach((ch, i) => {
        let html = `
            <div class="mb-8">
                <h3 class="font-bold text-lg mb-2">
                    Chapter ${i + 1} – ${ch.title}
                </h3>
        `;

        if (ch.title.includes('Work Plan') || ch.title.includes('Timetable')) {
            html += editableTable(
                ch.title.includes('Work Plan')
                    ? ['Strategies/Objectives','Program','Activities/Task','Materials','Financial','Human','Timeline']
                    : ['Activities','Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sept','Oct'],
                `chapters[${i}][table]`
            );
        } else if (ch.title.includes('Cost Estimates') || ch.title.includes('Financial Report') || ch.title.includes('Action Plan')) {
            html += costEstimateTable(`chapters[${i}][cost]`);
        } else if (ch.title.includes('Dissemination') || ch.title.includes('Utilization')) {
            html += editableTable(['Objectives','Strategy','Audience','Resources','Timeline'], `chapters[${i}][table]`);
        } else {
            html += `<textarea name="chapters[${i}][main]" rows="4" class="w-full border p-3 rounded-lg mb-3"></textarea>`;
            if (ch.subs) {
                ch.subs.forEach((sub, j) => {
                    html += `<label class="text-sm font-semibold">${sub}</label>
                             <textarea name="chapters[${i}][subs][${j}]" rows="3" class="w-full border p-3 rounded-lg mb-3"></textarea>`;
                });
            }
        }

        html += `</div>`;
        chaptersDiv.insertAdjacentHTML('beforeend', html);
    });

    loadAttachments();
};
</script>
@endsection