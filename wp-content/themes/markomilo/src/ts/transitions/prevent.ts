import { IPreventCheckData } from '@barba/core';

const prevent = ({ el }: IPreventCheckData) =>
    el.classList && el.classList.contains('ab-item');

export default prevent;
