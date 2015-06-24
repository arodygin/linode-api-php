<?php

//----------------------------------------------------------------------
//
//  Copyright (C) 2015 Artem Rodygin
//
//  This file is part of Linode API Client Library for PHP.
//
//  You should have received a copy of the MIT License along with
//  the library. If not, see <http://opensource.org/licenses/MIT>.
//
//----------------------------------------------------------------------

namespace Linode\Linode;

use Linode\BaseLinodeApi;

/**
 * This class is autogenerated.
 *
 * @version Linode API v3.3
 */
class ConfigApi extends BaseLinodeApi
{
    /**
     * Creates a Linode Configuration Profile.
     *
     * @param int    $LinodeID               [required]
     * @param string $Label                  [required] The Label for this profile
     * @param int    $KernelID               [required] The KernelID for this profile.  Found in avail.kernels()
     * @param string $DiskList               [required] A comma delimited list of DiskIDs; position reflects device node.  The 9th element for specifying the initrd.
     * @param string $RunLevel               [optional] One of 'default', 'single', 'binbash'
     * @param int    $RAMLimit               [optional] RAMLimit in MB.  0 for max.
     * @param string $virt_mode              [optional] Controls the virtualization mode. One of 'paravirt', 'fullvirt'
     * @param int    $RootDeviceNum          [optional] Which device number (1-8) that contains the root partition.  0 to utilize RootDeviceCustom.
     * @param string $RootDeviceCustom       [optional] A custom root device setting.
     * @param bool   $RootDeviceRO           [optional] Enables the 'ro' kernel flag.  Modern distros want this.
     * @param bool   $devtmpfs_automount     [optional] Controls if pv_ops kernels should automount devtmpfs at boot.
     * @param bool   $helper_distro          [optional] Enable the Distro filesystem helper.  Corrects fstab and inittab/upstart entries depending on the kernel you're booting.  You want this.
     * @param bool   $helper_xen             [optional] Deprecated - use helper_distro.
     * @param bool   $helper_disableUpdateDB [optional] Enable the disableUpdateDB filesystem helper
     * @param bool   $helper_depmod          [optional] Creates an empty modprobe file for the kernel you're booting.
     * @param bool   $helper_network         [optional] Automatically creates network configuration files for your distro and places them into your filesystem.
     * @param string $Comments               [optional] Comments you wish to save along with this profile
     *
     * @return array
     */
    public function create($LinodeID, $Label, $KernelID, $DiskList, $RunLevel = null, $RAMLimit = null, $virt_mode = null, $RootDeviceNum = null, $RootDeviceCustom = null, $RootDeviceRO = null, $devtmpfs_automount = null, $helper_distro = null, $helper_xen = null, $helper_disableUpdateDB = null, $helper_depmod = null, $helper_network = null, $Comments = null)
    {
        return $this->call('linode.config.create', array(
            'LinodeID'               => $LinodeID,
            'Label'                  => $Label,
            'KernelID'               => $KernelID,
            'DiskList'               => $DiskList,
            'RunLevel'               => $RunLevel,
            'RAMLimit'               => $RAMLimit,
            'virt_mode'              => $virt_mode,
            'RootDeviceNum'          => $RootDeviceNum,
            'RootDeviceCustom'       => $RootDeviceCustom,
            'RootDeviceRO'           => $RootDeviceRO,
            'devtmpfs_automount'     => $devtmpfs_automount,
            'helper_distro'          => $helper_distro,
            'helper_xen'             => $helper_xen,
            'helper_disableUpdateDB' => $helper_disableUpdateDB,
            'helper_depmod'          => $helper_depmod,
            'helper_network'         => $helper_network,
            'Comments'               => $Comments,
        ));
    }

    /**
     * Deletes a Linode Configuration Profile.
     *
     * @param int $LinodeID [required]
     * @param int $ConfigID [required]
     *
     * @return array
     */
    public function delete($LinodeID, $ConfigID)
    {
        return $this->call('linode.config.delete', array(
            'LinodeID' => $LinodeID,
            'ConfigID' => $ConfigID,
        ));
    }

    /**
     * Lists a Linode's Configuration Profiles.
     *
     * @param int $LinodeID [required]
     * @param int $ConfigID [optional]
     *
     * @return array
     */
    public function getList($LinodeID, $ConfigID = null)
    {
        return $this->call('linode.config.list', array(
            'LinodeID' => $LinodeID,
            'ConfigID' => $ConfigID,
        ));
    }

    /**
     * Updates a Linode Configuration Profile.
     *
     * @param int    $LinodeID               [optional]
     * @param int    $ConfigID               [required]
     * @param string $Label                  [optional] The Label for this profile
     * @param int    $KernelID               [optional] The KernelID for this profile.  Found in avail.kernels()
     * @param string $DiskList               [optional] A comma delimited list of DiskIDs; position reflects device node.  The 9th element for specifying the initrd.
     * @param string $RunLevel               [optional] One of 'default', 'single', 'binbash'
     * @param int    $RAMLimit               [optional] RAMLimit in MB.  0 for max.
     * @param string $virt_mode              [optional] Controls the virtualization mode. One of 'paravirt', 'fullvirt'
     * @param int    $RootDeviceNum          [optional] Which device number (1-8) that contains the root partition.  0 to utilize RootDeviceCustom.
     * @param string $RootDeviceCustom       [optional] A custom root device setting.
     * @param bool   $RootDeviceRO           [optional] Enables the 'ro' kernel flag.  Modern distros want this.
     * @param bool   $devtmpfs_automount     [optional] Controls if pv_ops kernels should automount devtmpfs at boot.
     * @param bool   $helper_distro          [optional] Enable the Distro filesystem helper.  Corrects fstab and inittab/upstart entries depending on the kernel you're booting.  You want this.
     * @param bool   $helper_xen             [optional] Deprecated - use helper_distro.
     * @param bool   $helper_disableUpdateDB [optional] Enable the disableUpdateDB filesystem helper
     * @param bool   $helper_depmod          [optional] Creates an empty modprobe file for the kernel you're booting.
     * @param bool   $helper_network         [optional] Automatically creates network configuration files for your distro and places them into your filesystem.
     * @param string $Comments               [optional] Comments you wish to save along with this profile
     *
     * @return array
     */
    public function update($LinodeID = null, $ConfigID, $Label = null, $KernelID = null, $DiskList = null, $RunLevel = null, $RAMLimit = null, $virt_mode = null, $RootDeviceNum = null, $RootDeviceCustom = null, $RootDeviceRO = null, $devtmpfs_automount = null, $helper_distro = null, $helper_xen = null, $helper_disableUpdateDB = null, $helper_depmod = null, $helper_network = null, $Comments = null)
    {
        return $this->call('linode.config.update', array(
            'LinodeID'               => $LinodeID,
            'ConfigID'               => $ConfigID,
            'Label'                  => $Label,
            'KernelID'               => $KernelID,
            'DiskList'               => $DiskList,
            'RunLevel'               => $RunLevel,
            'RAMLimit'               => $RAMLimit,
            'virt_mode'              => $virt_mode,
            'RootDeviceNum'          => $RootDeviceNum,
            'RootDeviceCustom'       => $RootDeviceCustom,
            'RootDeviceRO'           => $RootDeviceRO,
            'devtmpfs_automount'     => $devtmpfs_automount,
            'helper_distro'          => $helper_distro,
            'helper_xen'             => $helper_xen,
            'helper_disableUpdateDB' => $helper_disableUpdateDB,
            'helper_depmod'          => $helper_depmod,
            'helper_network'         => $helper_network,
            'Comments'               => $Comments,
        ));
    }
}
