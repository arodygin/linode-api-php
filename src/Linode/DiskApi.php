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
class DiskApi extends BaseLinodeApi
{
    /**
     * @param int    $LinodeID           [required]
     * @param string $Label              [required] The display label for this Disk
     * @param string $Type               [required] The formatted type of this disk.  Valid types are: ext3, ext4, swap, raw
     * @param int    $Size               [required] The size in MB of this Disk.
     * @param int    $FromDistributionID [optional]
     * @param bool   $isReadOnly         [optional] Enable forced read-only for this Disk
     * @param string $rootPass           [optional]
     * @param string $rootSSHKey         [optional]
     *
     * @return array
     */
    public function create($LinodeID, $Label, $Type, $Size, $FromDistributionID = null, $isReadOnly = null, $rootPass = null, $rootSSHKey = null)
    {
        return $this->call('linode.disk.create', array(
            'LinodeID'           => $LinodeID,
            'Label'              => $Label,
            'Type'               => $Type,
            'Size'               => $Size,
            'FromDistributionID' => $FromDistributionID,
            'isReadOnly'         => $isReadOnly,
            'rootPass'           => $rootPass,
            'rootSSHKey'         => $rootSSHKey,
        ));
    }

    /**
     * @param int    $LinodeID       [required]
     * @param string $Label          [required] The label of this new disk image
     * @param int    $DistributionID [required] The DistributionID to create this disk from.  Found in avail.distributions()
     * @param int    $Size           [required] Size of this disk image in MB
     * @param string $rootPass       [required] The root user's password
     * @param string $rootSSHKey     [optional] Optionally sets this string into /root/.ssh/authorized_keys upon distribution configuration.
     *
     * @return array
     */
    public function createFromDistribution($LinodeID, $Label, $DistributionID, $Size, $rootPass = null, $rootSSHKey = null)
    {
        return $this->call('linode.disk.createfromdistribution', array(
            'LinodeID'       => $LinodeID,
            'Label'          => $Label,
            'DistributionID' => $DistributionID,
            'Size'           => $Size,
            'rootPass'       => $rootPass,
            'rootSSHKey'     => $rootSSHKey,
        ));
    }

    /**
     * Creates a new disk from a previously imagized disk.
     *
     * @param int    $LinodeID   [required] Specifies the Linode to deploy on to
     * @param string $Label      [optional] The label of this new disk image
     * @param int    $ImageID    [required] The ID of the frozen image to deploy from
     * @param int    $Size       [optional] The size of the disk image to creates. Defaults to the minimum size required for the requested image
     * @param string $rootPass   [optional] Optionally sets the root password at deployment time. If a password is not provided the existing root password of the frozen image will not be modified
     * @param string $rootSSHKey [optional] Optionally sets this string into /root/.ssh/authorized_keys upon image deployment
     *
     * @return array
     */
    public function createFromImage($LinodeID, $Label, $ImageID, $Size, $rootPass = null, $rootSSHKey = null)
    {
        return $this->call('linode.disk.createfromimage', array(
            'LinodeID'   => $LinodeID,
            'Label'      => $Label,
            'ImageID'    => $ImageID,
            'Size'       => $Size,
            'rootPass'   => $rootPass,
            'rootSSHKey' => $rootSSHKey,
        ));
    }

    /**
     * @param int    $LinodeID                [required]
     * @param string $Label                   [required] The label of this new disk image
     * @param int    $DistributionID          [required] Which Distribution to apply this StackScript to.  Must be one from the script's DistributionIDList
     * @param int    $StackScriptID           [required] The StackScript to create this image from
     * @param string $StackScriptUDFResponses [required] JSON encoded name/value pairs, answering this StackScript's User Defined Fields
     * @param int    $Size                    [required] Size of this disk image in MB
     * @param string $rootPass                [required] The root user's password
     * @param string $rootSSHKey              [optional] Optionally sets this string into /root/.ssh/authorized_keys upon distribution configuration.
     *
     * @return array
     */
    public function createFromStackScript($LinodeID, $Label, $DistributionID, $StackScriptID, $StackScriptUDFResponses, $Size, $rootPass, $rootSSHKey = null)
    {
        return $this->call('linode.disk.createfromstackscript', array(
            'LinodeID'                => $LinodeID,
            'Label'                   => $Label,
            'DistributionID'          => $DistributionID,
            'StackScriptID'           => $StackScriptID,
            'StackScriptUDFResponses' => $StackScriptUDFResponses,
            'Size'                    => $Size,
            'rootPass'                => $rootPass,
            'rootSSHKey'              => $rootSSHKey,
        ));
    }

    /**
     * @param int $LinodeID [required]
     * @param int $DiskID   [required]
     *
     * @return array
     */
    public function delete($LinodeID, $DiskID)
    {
        return $this->call('linode.disk.delete', array(
            'LinodeID' => $LinodeID,
            'DiskID'   => $DiskID,
        ));
    }

    /**
     * Performs a bit-for-bit copy of a disk image.
     *
     * @param int $LinodeID [required]
     * @param int $DiskID   [required]
     *
     * @return array
     */
    public function duplicate($LinodeID, $DiskID)
    {
        return $this->call('linode.disk.duplicate', array(
            'LinodeID' => $LinodeID,
            'DiskID'   => $DiskID,
        ));
    }

    /**
     * @param int $LinodeID [required]
     * @param int $DiskID   [optional]
     *
     * @return array
     */
    public function getList($LinodeID, $DiskID = null)
    {
        return $this->call('linode.disk.list', array(
            'LinodeID' => $LinodeID,
            'DiskID'   => $DiskID,
        ));
    }

    /**
     * Creates a gold-master image for future deployments.
     *
     * @param int    $LinodeID    [required] Specifies the source Linode to create the image from
     * @param int    $DiskID      [required] Specifies the source Disk to create the image from
     * @param string $Label       [optional] Sets the name of the image shown in the base image list, defaults to the source image label
     * @param string $Description [optional] An optional description of the created image
     *
     * @return array
     */
    public function imagize($LinodeID, $DiskID, $Label = null, $Description = null)
    {
        return $this->call('linode.disk.imagize', array(
            'LinodeID'    => $LinodeID,
            'DiskID'      => $DiskID,
            'Label'       => $Label,
            'Description' => $Description,
        ));
    }

    /**
     * @param int $LinodeID [required]
     * @param int $DiskID   [required]
     * @param int $Size     [required] The requested new size of this Disk in MB
     *
     * @return array
     */
    public function resize($LinodeID, $DiskID, $Size)
    {
        return $this->call('linode.disk.resize', array(
            'LinodeID' => $LinodeID,
            'DiskID'   => $DiskID,
            'Size'     => $Size,
        ));
    }

    /**
     * @param int    $LinodeID   [optional]
     * @param int    $DiskID     [required]
     * @param string $Label      [optional] The display label for this Disk
     * @param bool   $isReadOnly [optional] Enable forced read-only for this Disk
     *
     * @return array
     */
    public function update($LinodeID, $DiskID, $Label = null, $isReadOnly = null)
    {
        return $this->call('linode.disk.update', array(
            'LinodeID'   => $LinodeID,
            'DiskID'     => $DiskID,
            'Label'      => $Label,
            'isReadOnly' => $isReadOnly,
        ));
    }
}
