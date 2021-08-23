import React from 'react';
import SVG from 'react-inlinesvg';

import '../../css/admin/shared/icon.scss';
import Tooltip from './Tooltip';

import IconClose from '../../icons/close.svg';
import IconCode from '../../icons/code.svg';
import IconDelete from '../../icons/delete.svg';
import IconEdit from '../../icons/edit.svg';
import IconLink from '../../icons/link.svg';
import IconPhoto from '../../icons/photo.svg';
import IconReload from '../../icons/reload.svg';
import IconTrash from '../../icons/trash.svg';
 
const icons = {
    close: IconClose,
    code: IconCode,
    delete: IconDelete,
    edit: IconEdit,
    link: IconLink,
    photo: IconPhoto,
    reload: IconReload,
    trash: IconTrash,
};

const Icon = (props) => {
    let icon = icons.hasOwnProperty(props.type) ? icons[props.type] : false;

    if ( !icon ) {
        return null;
    }

    let iconDisabled = false;
    let tooltipContent = props.title ? props.title : false;
    let className = 'eafl-admin-icon';

    // Check if there are requirements.
    if ( props.required ) {
        if ( ! eafl_admin.addons.hasOwnProperty( props.required ) || true !== eafl_admin.addons[ props.required ] ) {
            iconDisabled = true;
            className += ' eafl-admin-icon-required';

            const capitalized = props.required[0].toUpperCase() + props.required.substring(1);
            tooltipContent = `Easy Affiliate Links ${capitalized} Bundle Only`;
        }
    }

    return (
        <Tooltip content={tooltipContent}>
            <span
                className={className}
                onClick={ iconDisabled ? () => {
                    if ( confirm( 'Want to learn more about the version required for this feature?' ) ) {
                        window.open( 'https://bootstrapped.ventures/easy-affiliate-links/get-the-plugin/', '_blank' );
                    } 
                } : props.onClick }
                title={props.title}
            >
                <SVG
                    src={icon}
                />
            </span>
        </Tooltip>
    );
}
export default Icon;