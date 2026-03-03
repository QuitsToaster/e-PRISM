@extends('layouts.app')

@section('title', 'Submit Research')

@section('content')
<style>
    /* Custom gradient for vibrant dark blue to black */
    .bg-gradient-primary {
        background: linear-gradient(135deg, #2563eb 0%, #1a1a1a 100%);
    }
    .text-gradient-primary {
        background: linear-gradient(135deg, #2563eb 0%, #1a1a1a 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    .bg-gradient-header {
        background: linear-gradient(135deg, rgba(37, 99, 235, 0.1) 0%, rgba(26, 26, 26, 0.1) 100%);
    }
    .border-gradient-card {
        border: 2px solid transparent;
        background: linear-gradient(white, white) padding-box,
                    linear-gradient(135deg, #2563eb 0%, #1a1a1a 100%) border-box;
    }
    .border-gradient-separator {
        border: 0;
        height: 1px;
        background: linear-gradient(90deg, #2563eb 0%, #1a1a1a 100%);
    }
    .border-gradient-table {
        border: 2px solid transparent;
        background: linear-gradient(white, white) padding-box,
                    linear-gradient(135deg, #2563eb 0%, #1a1a1a 100%) border-box;
    }
    .hover-card-effect {
        transition: all 0.3s ease;
    }
    .hover-card-effect:hover {
        transform: translateY(-4px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.02);
    }
    /* Fix for table cell gradients - removed the pseudo-element that was showing */
    th, td {
        position: relative;
    }
    /* Remove the gradient line that was showing next to inputs */
    th:not(:last-child)::after, td:not(:last-child)::after {
        display: none;
    }
    /* Better table styling */
    .table-wrapper table {
        border-collapse: separate;
        border-spacing: 0;
    }
    .table-wrapper th,
    .table-wrapper td {
        background-color: white;
    }
    .table-wrapper input {
        background-color: white;
        border: 1px solid #e5e7eb;
    }
    .table-wrapper input:focus {
        border-color: #2563eb;
        ring-color: #2563eb;
    }
    /* Add proper top padding to account for fixed navbar */
    .content-wrapper {
        padding-top: 6rem;
    }
</style>

<!-- Main content with proper top padding -->
<div class="content-wrapper max-w-6xl mx-auto px-4">
    <!-- HEADER - Matching dashboard pattern -->
    <div class="bg-gradient-header rounded-xl p-6 mb-8 border border-gray-100">
        <div class="flex items-center gap-4">
            <div class="w-14 h-14 bg-gradient-primary rounded-xl flex items-center justify-center shadow-md">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
            </div>
            <div>
                <h1 class="text-2xl font-semibold text-gradient-primary">Submit Research</h1>
                <p class="text-sm text-gray-600 mt-1">
                    Choose what you want to submit, then complete the required fields.
                </p>
            </div>
        </div>
    </div>

    <!-- STEP 1 - Selection Cards -->
    <div class="border-gradient-card rounded-xl bg-white p-6 shadow-sm hover-card-effect mb-8">
        <h2 class="text-lg font-semibold text-gradient-primary mb-4 flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8s-9-3.582-9-8 4.03-8 9-8 9 3.582 9 8z"></path>
            </svg>
            What would you like to submit?
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <button id="btnProposal"
                class="border-2 border-[#2563eb]/20 bg-[#2563eb]/10 text-[#2563eb] p-6 rounded-xl hover:shadow-md transition-all duration-200 hover:-translate-y-1 font-semibold">
                <div class="flex flex-col items-center gap-2">
                    <svg class="w-8 h-8 text-[#2563eb]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Research Proposal
                </div>
            </button>

            <button id="btnCompleted"
                class="border-2 border-[#1a1a1a]/20 bg-[#1a1a1a]/10 text-[#1a1a1a] p-6 rounded-xl hover:shadow-md transition-all duration-200 hover:-translate-y-1 font-semibold">
                <div class="flex flex-col items-center gap-2">
                    <svg class="w-8 h-8 text-[#1a1a1a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Completed Research
                </div>
            </button>
        </div>
    </div>

    <!-- FORM - Card with Gradient Border -->
    <div id="submissionForm" class="border-gradient-card rounded-xl bg-white p-6 shadow-sm hidden">
        <form method="POST" action="{{ route('submit.paper') }}" enctype="multipart/form-data" class="space-y-8">
            @csrf

            <input type="hidden" id="classification" name="classification">
            <input type="hidden" id="selectedClassificationName" name="selected_classification_name">
            <input type="hidden" id="selectedResearchTypeName" name="selected_research_type_name">

            <!-- Selected Research Type Label - Appears after selection -->
            <div id="selectedTypeLabel" class="mb-4 p-3 bg-gradient-to-r from-[#2563eb]/10 to-[#1a1a1a]/10 rounded-lg border border-[#2563eb]/20 hidden">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-gradient-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="text-sm font-medium text-gray-700">Submitting: <span id="selectedTypeDisplay" class="text-gradient-primary font-semibold"></span></span>
                </div>
            </div>

            <!-- TYPE -->
            <div class="mb-6 pb-6 relative">
                <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-[#2563eb] to-[#1a1a1a]"></div>
                <label class="block text-sm font-semibold text-gradient-primary mb-3">Type of Research</label>
                <select id="researchType" name="research_type"
                        class="w-full border border-gray-300 p-3 rounded-lg focus:border-[#2563eb] focus:ring-2 focus:ring-[#2563eb]/20 transition">
                    <option selected disabled>Select type</option>
                    <option value="action">Action Research</option>
                    <option value="basic">Basic Research</option>
                </select>
            </div>

            <!-- PROPONENTS -->
            <div class="mb-6 pb-6 relative">
                <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-[#2563eb] to-[#1a1a1a]"></div>
                <label class="block text-sm font-semibold text-gradient-primary mb-3">Proponents (Max 5)</label>

                <div id="proponents" class="space-y-4"></div>

                <button type="button" id="addProponent"
                        class="mt-3 bg-gradient-primary text-white px-4 py-2 rounded-lg hover:opacity-90 transition">
                    + Add Proponent
                </button>
            </div>

            <!-- COMMON FIELDS -->
            <div class="mb-6 pb-6 relative">
                <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-[#2563eb] to-[#1a1a1a]"></div>
                <div class="grid md:grid-cols-2 gap-4 mb-4">
                    <input name="school" placeholder="School / Station" 
                           class="border border-gray-300 p-3 rounded-lg focus:border-[#2563eb] focus:ring-2 focus:ring-[#2563eb]/20 transition">
                    <input name="school_id" placeholder="School ID (Optional)" 
                           class="border border-gray-300 p-3 rounded-lg focus:border-[#2563eb] focus:ring-2 focus:ring-[#2563eb]/20 transition">
                </div>

                <input name="title" placeholder="Title of the Study" 
                       class="border border-gray-300 p-3 rounded-lg w-full focus:border-[#2563eb] focus:ring-2 focus:ring-[#2563eb]/20 transition">
            </div>

            <!-- CHAPTERS -->
            <div id="chapters" class="space-y-10"></div>

            <!-- ATTACHMENTS -->
            <div class="mb-6 pb-6 relative">
                <div class="absolute bottom-0 left-0 right-0 h-px bg-gradient-to-r from-[#2563eb] to-[#1a1a1a]"></div>
                <label class="block text-sm font-semibold text-gradient-primary mb-3">
                    Required PDF Attachments
                </label>

                <p class="text-sm text-gray-500 mb-4">
                    Please upload the required documents based on your research type and status.
                </p>

                <div id="attachmentsSection" class="space-y-4"></div>
            </div>

            <!-- ACTIONS -->
            <input type="hidden" name="action" id="formAction" value="draft">

            <div class="flex gap-4 pt-4">
                <button type="submit" onclick="document.getElementById('formAction').value='draft'"
                    class="bg-gray-600 text-white px-6 py-3 rounded-lg hover:bg-gray-700 transition font-medium shadow-sm">
                    Save Draft
                </button>
                <button type="submit" onclick="document.getElementById('formAction').value='submitted'"
                    class="bg-gradient-primary text-white px-6 py-3 rounded-lg hover:opacity-90 transition font-medium shadow-sm">
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
const selectedClassificationName = document.getElementById('selectedClassificationName');
const selectedResearchTypeName = document.getElementById('selectedResearchTypeName');
const selectedTypeLabel = document.getElementById('selectedTypeLabel');
const selectedTypeDisplay = document.getElementById('selectedTypeDisplay');
const form = document.getElementById('submissionForm');

/* SHOW FORM AND UPDATE LABEL */
document.getElementById('btnProposal').onclick = () => {
    classification.value = 'proposal';
    selectedClassificationName.value = 'Research Proposal';
    updateSelectedLabel();
    form.classList.remove('hidden');
    loadAttachments();
};

document.getElementById('btnCompleted').onclick = () => {
    classification.value = 'completed';
    selectedClassificationName.value = 'Completed Research';
    updateSelectedLabel();
    form.classList.remove('hidden');
    loadAttachments();
};

/* UPDATE THE SELECTED TYPE LABEL */
function updateSelectedLabel() {
    let typeText = selectedClassificationName.value;
    if (researchType.value) {
        const researchTypeText = researchType.value === 'action' ? 'Action Research' : 'Basic Research';
        typeText += ` - ${researchTypeText}`;
        selectedResearchTypeName.value = researchTypeText;
    }
    selectedTypeDisplay.textContent = typeText;
    selectedTypeLabel.classList.remove('hidden');
}

/* ADD PROPONENT WITH PHOTO */
document.getElementById('addProponent').onclick = () => {
    if (proponentCount >= maxProponents) return;

    proponentsDiv.insertAdjacentHTML('beforeend', `
        <div class="border-gradient-card rounded-lg p-4 relative bg-gray-50">
            <div class="grid md:grid-cols-3 gap-3">
                <input name="proponents[${proponentCount}][name]"
                       placeholder="Full Name"
                       class="border border-gray-300 p-2 rounded focus:border-[#2563eb] focus:ring-2 focus:ring-[#2563eb]/20 transition" required>
                <input name="proponents[${proponentCount}][position]"
                       placeholder="Position (Plantilla)"
                       class="border border-gray-300 p-2 rounded focus:border-[#2563eb] focus:ring-2 focus:ring-[#2563eb]/20 transition" required>
                <input type="file"
                       name="proponents[${proponentCount}][photo]"
                       accept="image/*"
                       class="border border-gray-300 p-2 rounded focus:border-[#2563eb] focus:ring-2 focus:ring-[#2563eb]/20 transition" required>
            </div>
            <button type="button"
                    onclick="this.parentElement.remove(); proponentCount--;"
                    class="absolute top-2 right-2 bg-red-500 text-white px-2 py-1 rounded text-sm hover:bg-red-600 transition">
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
            { title: "Chapter V. Action Research Work Plan and Timelines" },
            { 
                title: "Chapter VI. Cost Estimates (Tabular)",
                isCustomTable: true,
                tableColumns: ['Strategy', 'Program', 'Activity', 'Task', 'Personal Involve', 'Materials', 'Cost of Material', 'Timeline'],
                hasTotal: true
            },
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
            { 
                title: "Chapter VII. Cost Estimates (Tabular)",
                isCustomTable: true,
                tableColumns: ['Strategy', 'Program', 'Activity', 'Task', 'Personal Involve', 'Materials', 'Cost of Material', 'Timeline'],
                hasTotal: true
            },
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
            { 
                title: "Chapter VIII. Financial Report (Tabular)",
                isFinancialReport: true,
                tableColumns: ['Description', 'OR Number', 'Date', 'Amount'],
                hasTotal: false
            }
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
            { 
                title: "Chapter IX. Financial Report (Tabular)",
                isFinancialReport: true,
                tableColumns: ['Description', 'OR Number', 'Date', 'Amount'],
                hasTotal: false
            }
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
                <label class="block text-sm font-medium text-gradient-primary mb-1">
                    ${label} <span class="text-red-500">*</span>
                </label>
                <input 
                    type="file"
                    name="attachments[${index}]"
                    accept=".pdf"
                    required
                    class="w-full border border-gray-300 p-2 rounded-lg focus:border-[#2563eb] focus:ring-2 focus:ring-[#2563eb]/20 transition"
                >
            </div>
        `);
    });
}

/* =====================================================
   TABLE FUNCTIONS WITH GRADIENT BORDERS - FIXED
===================================================== */
function editableTable(columns, namePrefix, hasTotal = false) {
    const cols = columns.map(c => `<th class="border border-gray-200 px-3 py-2 text-gradient-primary bg-white">${c}</th>`).join('');
    return `
        <div class="table-wrapper border-gradient-table rounded-lg p-4" data-prefix="${namePrefix}">
            <table class="w-full border-collapse bg-white">
                <thead><tr>${cols}${hasTotal ? `<th class="border border-gray-200 px-3 py-2 text-gradient-primary bg-white">Total</th>` : ''}<th class="border border-gray-200 px-3 py-2 bg-white"></th></tr></thead>
                <tbody>${tableRow(columns, namePrefix, hasTotal, 0)}</tbody>
            </table>
            <button type="button" class="mt-3 bg-gradient-primary text-white px-4 py-2 rounded-lg hover:opacity-90 transition" onclick="addRow(this)">+ Add Row</button>
            ${hasTotal ? `<div class="text-right font-bold mt-3 text-gradient-primary">Grand Total: <span class="grand-total">0</span></div>` : ''}
        </div>
    `;
}

function tableRow(columns, namePrefix, hasTotal, index) {
    const cells = columns.map((_, colIndex) => `
        <td class="border border-gray-200 px-3 py-2 bg-white">
            <input name="${namePrefix}[${index}][${colIndex}]" class="w-full border border-gray-300 p-2 rounded focus:border-[#2563eb] focus:ring-2 focus:ring-[#2563eb]/20 transition bg-white" />
        </td>`).join('');
    
    if (hasTotal) {
        return `
            <tr>
                ${cells}
                <td class="border border-gray-200 px-3 py-2 bg-white"><input class="row-total w-full border border-gray-300 p-2 rounded bg-gray-50" readonly></td>
                <td class="border border-gray-200 px-3 py-2 text-center bg-white">
                    <button type="button" onclick="this.closest('tr').remove(); calculateTotals();" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600 transition">✕</button>
                </td>
            </tr>
        `;
    } else {
        return `
            <tr>
                ${cells}
                <td class="border border-gray-200 px-3 py-2 text-center bg-white">
                    <button type="button" onclick="this.closest('tr').remove();" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600 transition">✕</button>
                </td>
            </tr>
        `;
    }
}

function addRow(btn) {
    const wrapper = btn.closest('.table-wrapper');
    const tbody = wrapper.querySelector('tbody');
    const prefix = wrapper.dataset.prefix;
    const hasTotal = !!wrapper.querySelector('.grand-total');
    const colCount = wrapper.querySelectorAll('thead th').length - (hasTotal ? 2 : 1);
    const index = tbody.children.length;
    const columns = Array(colCount).fill('');
    tbody.insertAdjacentHTML('beforeend', tableRow(columns, prefix, hasTotal, index));
}

function costEstimateTable(namePrefix) {
    return editableTable(['Strategy','Program','Activity','Task','Personal Involve','Materials','Cost of Material','Timeline'], namePrefix, true);
}

function financialReportTable(namePrefix) {
    return editableTable(['Description', 'OR Number', 'Date', 'Amount'], namePrefix, false);
}

/* =====================================================
   AUTO TOTAL CALC - Only for tables with total
===================================================== */
function calculateTotals() {
    document.querySelectorAll('.table-wrapper').forEach(wrapper => {
        const grandTotalElem = wrapper.querySelector('.grand-total');
        if (!grandTotalElem) return;
        let grand = 0;
        wrapper.querySelectorAll('tbody tr').forEach(row => {
            const costOfMaterial = parseFloat(row.querySelector('input[name*="[6]"]')?.value) || 0;
            const totalInput = row.querySelector('.row-total');
            if (totalInput) {
                totalInput.value = costOfMaterial.toFixed(2);
                grand += costOfMaterial;
            }
        });
        grandTotalElem.innerText = grand.toFixed(2);
    });
}

document.addEventListener('input', calculateTotals);

/* =====================================================
   LOAD CHAPTERS
===================================================== */
researchType.onchange = () => {
    chaptersDiv.innerHTML = '';
    if (!classification.value) return;
    
    updateSelectedLabel();

    const list = chapterMap[classification.value][researchType.value];

    list.forEach((ch, i) => {
        let html = `
            <div class="border-gradient-card rounded-lg bg-white p-5 mb-6">
                <h3 class="font-bold text-lg text-gradient-primary mb-4">
                    ${ch.title}
                </h3>
        `;

        if (ch.isFinancialReport) {
            html += financialReportTable(`chapters[${i}][financial]`);
        } else if (ch.isCustomTable) {
            html += editableTable(ch.tableColumns, `chapters[${i}][cost]`, ch.hasTotal);
        } else if (ch.title.includes('Work Plan') || ch.title.includes('Timetable')) {
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
            html += `<textarea name="chapters[${i}][main]" rows="4" class="w-full border border-gray-300 p-3 rounded-lg mb-3 focus:border-[#2563eb] focus:ring-2 focus:ring-[#2563eb]/20 transition"></textarea>`;
            if (ch.subs) {
                ch.subs.forEach((sub, j) => {
                    html += `<label class="text-sm font-semibold text-gradient-primary block mt-3">${sub}</label>
                             <textarea name="chapters[${i}][subs][${j}]" rows="3" class="w-full border border-gray-300 p-3 rounded-lg mb-3 focus:border-[#2563eb] focus:ring-2 focus:ring-[#2563eb]/20 transition"></textarea>`;
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