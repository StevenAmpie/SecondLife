document.addEventListener('DOMContentLoaded', function () {
    const el = document.getElementById('card_expiration');

    el.addEventListener('input', function (e) {
        let digits = e.target.value.replace(/\D/g, ''); // numbers only
        if (digits.length > 4) digits = digits.slice(0, 4); // max MMYY

        let month = '';
        let year = '';

        if (digits.length === 0) {
            e.target.value = '';
            return;
        }

        if (digits.length === 1) {
            e.target.value = digits; // allow typing first digit
            return;
        }

        const d0 = digits.charAt(0);
        const d1 = digits.charAt(1);

        // build month based on first digits
        if (d0 === '0') {
            month = '0' + d1;
            if (month === '00') month = '01';
            year = digits.slice(2);
        } else if (d0 === '1') {
            month = '1' + d1;
            let m = parseInt(month, 10);
            if (m < 1) month = '01';
            if (m > 12) month = '12';
            year = digits.slice(2);
        } else {
            month = '0' + d0; // auto-correct 2–9 → 02–09
            year = digits.slice(1);
        }

        if (year.length > 2) year = year.slice(0, 2); // max 2 digits

        // final format MM/YY
        e.target.value = year.length === 0 ? month : month + '/' + year;
    });
});


